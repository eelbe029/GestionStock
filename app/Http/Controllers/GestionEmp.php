<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use App\Models\Personnel;
use App\Models\Historique;
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
        $collection = DB::select('SELECT
    types.name AS \'type\',
    articles.marque,
    articles.model,
    COUNT(*) AS \'Qte\'
FROM
    articles
JOIN
    types ON articles.typeID = types.id
GROUP BY
    types.name, articles.marque, articles.model;
');
        return DataTables::of($collection)->make(true);
    }

    //Page articles en stock
    public function articlesHome()
    {
        return view('articlestock');
    }

    public function articledata(): JsonResponse
    {
        $collection = DB::select('SELECT articles.id AS \'ID\',marque,model,types.name AS \'type\' FROM articles,types WHERE etat = \'enstock\' AND types.id = articles.typeId ');

        return
            DataTables::of($collection)
                ->addColumn('actions', function ($row) {
                    return '<button  type="button" class=" assign btn btn-primary" data-id="'.$row->ID.'" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Assigner a un employe</button>';
                })
                ->rawColumns(['actions'])
                ->make();
    }

    public function assignmodal($id){
        $article = Article::findOrFail($id);
        return view('modalAssigner',compact('article'));
    }

    #[NoReturn] public function assign(Request $request){
        $personnel = Personnel::where('nom', $request->nom)
                                ->where('emplacement', $request->emplacement)
                                ->count();

        //Passe l'etat de l'article de enstock a assignee
        $article = Article::findOrFail($request->articleID);
        $article->etat = 'assigned';
        $article->save();

        //Verifie si le personnel entree existe ou non
        if ($personnel == 1) {

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

        } else {
            //Creer un nouveau personnel s'il n'existait pas
            $personnel = new Personnel();
            $personnel->nom = $request->nom;
            $personnel->emplacement = $request->emplacement;
            $personnel->save();

            //Creer l'historique liee a l'association
            $historique = new Historique();
            $historique->DateAssignement = now();
            $historique->articleId = $article->id;
            $historique->personnelId = $personnel->id;
            $historique->DateDissociation = now();
            $historique->active = true;
            $historique->save();
        }
        return view('articlestock');
    }
    public function autocompletename(Request $request)
    {
        $query = $request->get('query');
        $data = Personnel::where('emplacement', 'LIKE', "%{$query}%")->get(); // Adjust the query to your needs
        return response()->json($data);
    }

}
