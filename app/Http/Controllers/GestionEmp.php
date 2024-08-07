<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
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
    //Page dashboard
    public function graphdisp(){
        $types = Type::orderBy('QteDisponible', 'desc')->get();
        return $types;
    }
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
       /* $collection = Article::select('Model','typeId','marqueId', \DB::raw('COUNT(*) as Qte'))
                        ->groupBy('Model','typeId','marqueId')
                        ->get();*/

        $collection = Article::select('Model','typeId','marqueId')
            ->selectRaw('COUNT(CASE WHEN Etat = "enstock" THEN 1 END) as enstock')
            ->selectRaw('COUNT(CASE WHEN Etat = "sorti" THEN 1 END) as sorti')
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
                    return '<button  type="button" class=" assign btn btn-primary btn-sm" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Assigner a un employe</button>
<button type="button" class="historique btn btn-success btn-sm" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#userModal">Historique</button>';
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

        //Decremente la qte disponible
        $type = $article->type;
        $type->QteDisponible--;
        $type->QteSortante++;
        $type->save();

        //Recupere les donnees du personnel a qui on associe
        $personnel = Personnel::select('*')
                    ->where('nom', $request->nom)
                    ->where('emplacement', $request->emplacement)
                    ->get();

        //Creer l'historique liee a l'association
        $historique = new Historique();
        $historique->DateAssignement = now();
        $historique->articleId = $article->id;
        foreach ($personnel as $person) {
            $historique->personnelId = $person->id;
        }
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
    public function histdata($id){
        $historiques = Historique::with('personnel')->where('articleId',$id)->get();

        return $historiques;
    }


    //Page saisie de nouvel article
        //Redirection page principle de saisie article
    public function saisieHome(){
        $collection = Type::all();
        $marques = Marque::all();
        return view('stockentrant',compact('collection','marques'));
    }
        //Injection nouveau champ de saisie
    public function champsaisie($val){
        $collection = Type::all();
        $marques = Marque::all();
        return view('champsaisie',compact('val','collection','marques'));
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
        //Ajout du stock saisie
    public function saisieEntree(Request $request){
        for ($i = 0; $i < sizeof($request->all())/4 ; $i++) {
                $typename = $request->input('type'.$i);
                $marquename = $request->input('marque'.$i);
                $modelname = $request->input('model'.$i);
                $nombre = $request->input('nombre'.$i);

                //find the id's
                $type = Type::where('name', $typename)->first();
                $marque = Marque::where('name', $marquename)->first();

                //Renseigne le numero de la saisie en tant que commande pour avoir un suivi
                $commande = new Commande();
                $commande->dateCommande = now();
                $commande->dateLivraison = now();
                $commande->recue = 1;
                $commande->reference = $request->reference;
                $commande->save();

                //Enregistre les articles entree
                for ($j = 0; $j < $nombre; $j++) {
                    $article = new Article();
                    $article->marqueId = $marque->id;
                    $article->typeId = $type->id;
                    $article->Model = $modelname;
                    $article->Etat = 'enstock';
                    $article->commandeId = $commande->id;
                    $article->save();
                }
        }
        return redirect('/saisie');
    }

    //Fonctions de la page articles sorti de stock
    public function articleSortiHome()
    {
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
                    foreach($historique as $hist){
                        return $hist->personnel->emplacement;
                    }
                })
                ->editColumn("nom",function($article){
                    $historique = $article->historique->where('active','1');
                    foreach($historique as $hist){
                        return $hist->personnel->nom;
                    }
                })
                ->addColumn('actions', function ($row) {
                    $historique = $row->historique->where('active');
                    foreach($historique as $hist){
                        return '<button  type="button" class="delete btn btn-danger" data-id="'.$hist->id.'">Dissocier</button>';
                    }

                })
                ->rawColumns(['actions'])
                ->make();
    }
    public function dissocier($id){
        //Recupere les objets concerne
        $historique = Historique::findOrFail($id);
        $article = $historique->article;

        //Effectue la dissociation
        $article->etat = 'enstock';
        $historique->active = false;

        //Met a jour la qte du type
        $type = $article->type;
        $type->QteSortante-- ;
        $type->QteDisponible++;

        //Historique date dissociation
        $historique->DateDissociation = now();

        //Sauvegarde les objets
        $article->save();
        $historique->save();
        $type->save();


        return 'ok';

    }






}
