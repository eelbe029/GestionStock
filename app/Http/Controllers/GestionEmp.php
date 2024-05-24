<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GestionEmp extends Controller
{
    public function articlesHome(){
        return view('articlestock');
    }
    public function articledata(): JsonResponse
    {
        $collection = DB::select('SELECT articles.id AS \'ID\',marque,model,types.name AS \'type\' FROM articles,types WHERE etat = \'enstock\' AND types.id = articles.typeId ');

        return DataTables::of($collection)->make();
    }

}
