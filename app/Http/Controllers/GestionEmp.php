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
    public function stockhome(){
        return view('stock');
    }
    public function articlesHome(){
        return view('articlestock');
    }
    public function GeneralView() JsonResponse
    {
       $collection = Type::all();
       return DataTables::of($collection)->make(true);
    }
    public function articledata(): JsonResponse
    {
        $collection = DB::select('SELECT articles.id AS \'ID\',marque,model,types.name AS \'type\' FROM articles,types WHERE etat = \'enstock\' AND types.id = articles.typeId ');

        return
            DataTables::of($collection)
                ->addColumn('actions',function($collection){
                return '<a href="#" class="btn btn-sm btn-primary">Assigner a un employe</a>';
                })
                ->rawColumns(['actions'])
                ->make();
    }

}
