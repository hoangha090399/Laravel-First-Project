<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index()
    {

    }
    
    public function getData($id)
    {
        //
        $data = Article::where("user_id",$id)->get();
		return View('article.data_view', compact('data'));
    }
}
