<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use App\Models\Personnel;
use App\Models\Historique;
use App\Models\Marque;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;
use Yajra\DataTables\DataTables;

class GestionEmp extends Controller
{
    //Page stock general et stock detaille
    public function stockhome()
    {
        return view('stock');
    }
    public function stockSecondary()
    {
        return view('stockdetails');
    }

    public function generalStockView(): JsonResponse
    {
        $collection = Type::all();
        return DataTables::of($collection)->make(true);
    }

    public function detailedStockView(): JsonResponse
    {
        $collection = Article::select('Model','typeId','marqueId', \DB::raw('COUNT(*) as Qte'))
                        ->groupBy('Model','typeId','marqueId')
                        ->get();

        return DataTables::of($collection)
            ->editColumn("marque",function($article){
                return $article->marque->name;
            })
            ->editColumn("type",function($article){
                return $article->type->name;
            })
            ->make();
    }

    //Page articles en stock
    public function articlesHome()
    {
        return view('articlestock');
    }

    public function articledata(): JsonResponse
    {
        $collection = Article::select('id','marqueId','Model','typeId')
                                ->where('etat','enstock')
                                ->get();

        return
            DataTables::of($collection)
                ->editColumn("marque",function($article){
                    return $article->marque->name;
                })
                ->editColumn("type",function($article){
                    return $article->type->name;
                })
                ->addColumn('actions', function ($row) {
                    return '<button  type="button" class=" assign btn btn-primary" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Assigner a un employe</button>';
                })
                ->rawColumns(['actions'])
                ->make();
    }

    public function assignmodal($id){

        $article = Article::findOrFail($id);
        $employees = Personnel::all();

        return view('modalAssigner',compact('article','employees'));

    }

    #[NoReturn] public function assign(Request $request){

        //Passe l'etat de l'article de enstock a assignee
        $article = Article::findOrFail($request->articleID);
        $article->etat = 'sorti';
        $article->save();

        //Recupere les donnees du personnel a qui on associe
        $personnel = Personnel::where('nom', $request->nom)
                    ->where('emplacement', $request->emplacement)
                    ->get();

        //Creer l'historique liee a l'association
        $historique = new Historique();
        $historique->DateAssignement = now();
        $historique->articleId = $article->id;
        $historique->personnelId = $personnel[0]->id;
        $historique->DateDissociation = now();
        $historique->active = true;
        $historique->save();

        return view('articlestock');
    }
    public function autocompletename(Request $request): JsonResponse
    {
        $data = [];

        if($request->filled('q')){
            $data = Personnel::select("nom", "id")
                ->where('nom', 'LIKE', '%'. $request->get('q'). '%')
                ->take(10)
                ->get();
        }

        return response()->json($data);
    }

    //Page saisie de nouvel article
        //Redirection page principle de saisie article
    public function saisieHome(){
        $collection = Type::all();
        $marques = Marque::all();
        return view('stockentrant',compact('collection','marques'));
    }
        //Injection modal nouveau type
    public function modalType(){
        return view('modalType');
    }
        //Injection modal nouvelle marque
    public function modalMarque(){
        return view('modalMarque');
    }
        //Ajout nouveau type
    public function nouveauType(Request $request){
        $type = new Type();
        $type->name = $request->name;
        $type->QteDisponible = 0;
        $type->QteSortante = 0;
        $type->save();
        return redirect('/saisie');
    }
        //Ajout nouvelle marque
    public function nouvelleMarque(Request $request){
        $marque = new Marque();
        $marque->name = $request->name;
        $marque->save();
        return redirect('/saisie');
    }

    //Fonctions de la page articles sorti de stock
    public function articleSortiHome(){
        return view('articlesorti');
    }
    public function articleSortiData(Request $request): JsonResponse
    {
        $collection = Article::select('id','marqueId','Model','typeId')
                                ->where('etat','sorti')
                                ->get();
        return
            DataTables::of($collection)
                ->editColumn("marque",function($article){
                    return $article->marque->name;
                })
                ->editColumn("type",function($article){
                    return $article->type->name;
                })
                ->editColumn("emplacement",function($article){
                    $historique = $article->historique->where('active','1');
                    return $historique[0]->personnel->emplacement;
                })
                ->editColumn("nom",function($article){
                    $historique = $article->historique->where('active','1');
                    return $historique[0]->personnel->nom;
                })
                ->addColumn('actions', function ($row) {
                    $historique = $row->historique->where('active');
                    return '<button  type="button" class="delete btn btn-danger" data-id="'.$historique[0]->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Dissocier</button>';
                })
                ->rawColumns(['actions'])
                ->make();
    }
    public function dissocier($id){
        //Recupere les objets concerne
        $historique = Historique::findOrFail($id);
        $article = $historique->article;

        //

    }

}
