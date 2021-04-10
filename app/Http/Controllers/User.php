<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Record;//model load
use Illuminate\Support\Facades\DB;
class User extends Controller
{
    //for dispaly record
    function show()
    {
    	$data=DB::table('records')
    					->limit(20)
    					->get();
    	// $data=DB::select('select * from records');
    	return view('home',["data"=>$data]);
    }

    //for insert
    function signup(Request $req)
    {
    	// $record=new Record;
    	$name=$req->input('name');
    	$email=$req->input('email');
    	$password=$req->input('password');
    	if($req->hasfile('pic'))
    	{
    		$file=$req->file('pic');
    		$extenson=$file->getClientOriginalExtension();
    		$filename=time().'.'.$extenson;
    		$file->move('img/',$filename);
    		$pic=$filename;
    	}
    	else
    	{
    		return $req;
    		$pic='';
    	}
    	// $record->save();
    	$data=DB::table('records')
    	->insert([
    		"name"=>$name,
    		"email"=>$email,
    		"password"=>$password,
    		"pic"=>$pic
    	]);
    	return redirect('home');
    }


    //for edit
    function edit($id)
    {
    	// $data=record::find($id);
    	$data=DB::table('records')
    				->where('id',$id)
    				->get();
    	return view('edit',["data"=>$data]);
    }

    //for update
    function update(Request $req)
    {
    	// $data=record::find($req->id);
    	$id=$req->id;
    	$name=$req->name;
    	$email=$req->email;
    	$data=DB::table('records')
    				->where('id',$id)
    				->update([
    					"name"=>$name,
    					"email"=>$email
    				]);
    	// $data->save();
    	return redirect('home');
    }
}
