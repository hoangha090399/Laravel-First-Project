<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
		return View('tag.list_tag',['tags' => $tags]);
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
        $tag = DB::table('tags');
        $tag->tag = $request->input('tag');
        $tag->status = $request->input('status');
        $tag->price = $request->input('price');
        $affected = DB::table('tags')->insert(
            [
                "tag" => $tag->tag,
                "status" => $tag->status,
                "price" => $tag->price
            ]
        );
        return redirect('/tags');
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
        $tag =  DB::table('tags')->where('id',$id)->first();
			return View('tag.edit_tag',['tag'=>$tag]);
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
        $tag = DB::table('tags')->find($id);
        $tag->tag = $request->input('tag');
        $tag->status = $request->input('status');
        $tag->price = $request->input('price');
			$affected = DB::table('tags')
				->where('id', $id)
				->update(['tag' =>  $tag->tag,
							'status' =>  $tag->status,
							'price' =>  $tag->price
					]);
			return redirect('/tags');
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
        DB::table('tags')->where('id', $id)->delete();
        return redirect('/tags'); 
    }
}
