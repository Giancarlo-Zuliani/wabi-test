<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation;
//Models
use App\User;
use App\Project;
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
        $newpic = ['url' => $destfile , 'description' => $request -> description];
        $new = Picture::make($newpic);
        $prj = Project::findOrFail($id);
        $new -> project() -> associate($prj);
        $new -> save();
        return redirect() -> back();
    }
    public function deleteImage($id){
        $img = Picture::findOrFail($id);
        $img -> delete();
        try{
            $file = storage_path('app/public/projects-resources/' . $img);
            File::delete($file); 
        }catch(\exception $e){};
        return redirect() -> back();
    }
    public function createProject(Request $request){
        $data = $request -> all();
        $prj = ['title' => $request -> title , 'description' => $request -> description];
        $image = $request -> file('propic');
        $ext = $image -> getClientOriginalExtension();
        $name = rand(10000,99999) .'_'.time();
        $destfile = $name . '.' . $ext;
        $image -> storeAs('projects-resources' , $destfile ,'public');
        $newpic = ['url' => $destfile , 'description' => $request -> imgcaption];
        $new = Picture::make($newpic);
        $project = Project::make($prj);
        $project -> save();
        $new -> project() -> associate($project);
        $new -> save();
        return redirect() -> back();
    }
}
