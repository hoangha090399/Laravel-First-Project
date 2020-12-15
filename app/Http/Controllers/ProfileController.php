<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profiles = DB::table('profiles')->get();
        return View('user.index',['profiles'=>$profiles]);
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
        
        $profile = DB::table('profiles');
        $profile->user_id = $request->input('user_id');
        $profile->full_name = $request->input('full_name');
        $profile->address = $request->input('address');
        $profile->avatar = $request->input('avatar');
        $profile->birthday = $request->input('birthday');  
        $affected = DB::table('profiles')->insert(
            [
                "user_id" =>  $profile->user_id,
                "full_name" => $profile->full_name,
                "address" => $profile->address,
                "avatar" => 'https://png.pngtree.com/png-vector/20191009/ourmid/pngtree-user-icon-png-image_1796659.jpg|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
                "birthday" => $profile->birthday
            ]
        );

        if ($request->file()) {
            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
            $profile->avatar = '/storage/' . $filePath;
        // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
        }

        return redirect('/users')
        ->with('success', 'Profile1 has updated.')//lưu thông báo kèm theo để hiển thị trên view
        ->with('file', $fileName);
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
        $user =  DB::table('users')->where('id',$id)->get();
        if(is_null($id))
        {
            $message = "Create profile?";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return View('profile.createProfile');
        }
        else
        {
            $user =  DB::table('users')->where('id',$id)->first();
            $profile =  DB::table('profiles')->where('user_id',$id)->first();
			return View('profile.show',['profile'=>$profile],['user'=>$user]);
        }
        
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
        $profile =  DB::table('profiles')->where('user_id',$id)->first();
			return View('profile.edit',['profile'=>$profile]);
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
        $profile = Profile::find($id);//eloquent
        $profile->full_name = $request->input('full_name');
        $profile->address = $request->input('address');
        $profile->birthday = $request->input('birthday');
	 
		$validate = $request->validate([
            'avatar' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
			'birthday'=>'nullable|date',
            'full_name' =>'required',
            'address' =>'required'
        ]);

        if ($request->file()) {
            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
            $profile->avatar = '/storage/' . $filePath;
        // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
        }

        $profile->save(); //lưu
        return redirect('/profiles')
                    ->with('success', 'Profile1 has updated.')//lưu thông báo kèm theo để hiển thị trên view
                    ->with('file', $fileName);
		
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
        DB::table('users')->where('id', $id)->delete();
        DB::table('profiles')->where('id', $id)->delete();
        return redirect('/users'); 
        
        

    }
}
