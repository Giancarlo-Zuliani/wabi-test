<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Illuminate\Validation;

class MainController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('pages.index' , compact('projects')); 
    }
    public function login(){
        return view('pages.login');
    }
    public function dashboard(){
        $projects = Project::all();
        return view('pages.dashboard' , compact('projects'));
    }
    public function storeproject(Request $request){
        $data = $request -> all();
        Validate={[
            name :
        ]};
        dd($data);
    }
}
