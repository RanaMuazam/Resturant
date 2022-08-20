<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Session;
use App\Models\user;
use Crypt;
class RestoController extends Controller
{
    function index()
    {
        return view('home');
    }
    function list()
    {
        $data= Restaurant::all();
        return view('list',["data"=>$data]);
    }
    function add(Request $req)
    {
       // return $req->input();
       $resto= new Restaurant;
       $resto->name=$req->input('name');
       $resto->email=$req->input('email');
       $resto->address=$req->input('address');
       $resto->save();
        $req->Session()->flash('status','Restaurant Added Successfully');
       return redirect('list');
    }
    function delete($id)
    {
         Restaurant::find($id)->delete();
        Session::flash('status','Restaurant deleted Successfully');
       return redirect('list');
    }
    function edit($id)
    {
        $data= Restaurant::find($id);
        return view('edit',['data'=>$data]);
    }
    function update(Request $req)
    {
       $resto= Restaurant::find($req->input('id'));
       $resto->name=$req->input('name');
       $resto->email=$req->input('email');
       $resto->address=$req->input('address');
       $resto->save();
        $req->Session()->flash('status','Restaurant Updated Successfully');
       return redirect('list');
    }
    function register(Request $req)
    {
        //echo Crypt::encrypt('123@abc');
      //return  $req->input();
      $user= new User;
      $user->name=$req->input('name');
      $user->email=$req->input('email');
      $user->password=Crypt::encrypt($req->input('password'));
      $user->contact=$req->input('contact');
      $user->save();
      return redirect('login');
    }
    function login(request $req)
    {
        $user= User::where("email",$req->input('email'))->get();
        if( Crypt::decrypt($user[0]->password)==$req->input('password'))
        {
            $req->Session()->put('user',$user[0]->name);
            return redirect('/');
        }
    }
    function search(request $req)
    {
       
        $data  = Restaurant::
        where('name','like','%'.$req->input('query').'%')
        ->get();
         return view('search',["data"=>$data]);
    }
}
