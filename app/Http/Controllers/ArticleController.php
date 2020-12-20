<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
		return View('article.list' ,['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $articletag = DB::table('article_tag');
        $articletag->article_id = $request->input('article_id');
        $articletag->tag_id = $request->input('tag_id');
        $affected = DB::table('article_tag')->insert(
            [
                "article_id" => $articletag->article_id,
                "tag_id" => $articletag->tag_id,
            ]
        );

        $article = DB::table('articles');
        $article->user_id = $request->input('user_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->created_at = $request->input('created_at');
        $affected = DB::table('articles')->insert(
            [
                "user_id" => $article->user_id,
                "title" => $article->title,
                "body" => $article->body,
                "created_at" => $article->created_at
            ]
        );
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article =  DB::table('articles')->where('id',$id)->first();

        $articles = Article::find($id);
        return View('article.showArticle',['article'=>$article],['articles' => $articles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);
        return View('article.editArticle',['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article = DB::table('articles')->find($id);
        $article->user_id = $request->input('user_id');
        $article->status = $request->input('status');
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->created_at = $request->input('created_at');
        $affected = DB::table('articles')
            ->where('id', $id)
            ->update(['user_id' =>  $article->user_id,
                        'status' =>  $article->status,
                        'title' =>  $article->title,
                        'body' =>  $article->body,
                        'created_at' =>  $article->created_at
                ]);
			return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
