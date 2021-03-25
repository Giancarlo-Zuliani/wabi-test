<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;

class MainController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('pages.index' , compact('projects')); 
    }
    public function login(){
        return view('pages.login');
    }
}
