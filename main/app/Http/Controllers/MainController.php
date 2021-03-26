<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation;
use App\Picture;

class MainController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('pages.index' , compact('projects')); 
    }
    public function login(){
        return view('auth.login');
    }
    public function dashboard(){
        $projects = Project::all();
        return view('pages.dashboard' , compact('projects'));
    }
    public function storeproject(Request $request){
        $data = $request -> all();
        dd($data);
    }
    public function updateImage(Request $request ,$id){
        $image = $request -> file('img');
        $ext = $image -> getClientOriginalExtension();
        $name = rand(10000,99999) .'_'.time();
        $destfile = $name . '.' . $ext;
        $image -> storeAs('projects-resources' , $destfile ,'public');
        $prj = Project::findOrFail($id);
        $newpic = ['url' => $destfile , 'description' => $request -> description];
        $new = Picture::make($newpic);
        $new -> project() -> associate($prj);
        $new -> save();
        return redirect() -> back();
    }
}
