<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

}
