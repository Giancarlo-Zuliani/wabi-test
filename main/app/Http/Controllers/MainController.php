<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\contactForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
    public function updateImage(Request $request ,$id){
        $data = $request -> all();
        Validator::make([
            'description' => 'required,min:5',
            'img' => 'required'
        ],[
            'description.required' => 'Descrizione immagine richiesta',
            'description.min' => 'Minimo 5 caratterin per la descrizione dell`immagine',
            'img.required' => 'immagine richiesta'
        ]) -> validate();

        $image = $request -> file('img');
        $destfile = $this -> storeImage($image);
        $newpic = ['url' => $destfile , 'description' => $request -> description];
        $new = Picture::make($newpic);
        $prj = Project::findOrFail($id);
        $new -> project() -> associate($prj);
        $new -> save();
        return redirect() -> back();
    }
    public function deleteImage($id){
        $img = Picture::findOrFail($id);
        $project = $img -> project;
        if(count($project -> pictures) > 1){
            $img -> delete();
            try{
                $file = storage_path('app/public/projects-resources/' . $img);
                File::delete($file); 
            }catch(\exception $e){};
            return redirect() -> back();
        }else{
            return redirect() -> back()->withErrors(['lastpic'=>'ogni progetto deve avere almeno un immagine']);
        }
    }
    public function createProject(Request $request){
        $data = $request -> all();        
        Validator::make($data,[
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'propic' => 'required',
            'imgcaption' => 'required|string|min:5'
        ],[
            'title.min' => 'Minimo 3 caratteri per il titolo del progetto',
            'description.min' => 'Minimo 5 caratteri per la descrizione del progetto',
            'title.required' => ' Titolo richiesto',
            'description.required' => 'Descrizione richiesta',
            'propic.required' => 'Immagine del progetto richiesta',
            'imgcaption.min' => 'Descrizione dell immagine richiesta',
            'imgcaption.required' => 'Descrizione dell immagine richiesta'
        ])->validate();

        $prj = ['title' => $request -> title , 'description' => $request -> description];
        $image = $request -> file('propic');
        $destfile = $this -> storeImage($image);
        $newpic = ['url' => $destfile , 'description' => $request -> imgcaption];
        $new = Picture::make($newpic);
        $project = Project::make($prj);
        $project -> save();
        $new -> project() -> associate($project);
        $new -> save();
        return redirect() -> back();
    }
    public function contactForm(){
        return view('pages.contactform');
    }
    public function sendContactMail(Request $request){
        $form = $request -> all();
        $myMail = 'slaigox@gmail.com';
        Mail::to($myMail) -> send(new contactForm($form));
        return redirect() -> route('index');
    }
    public function deleteProject($id){
        $project = Project::findOrFail($id);
        $immages = $project -> pictures() -> get();
        foreach($immages as $img){
            try{
                $file = storage_path('app/public/projects-resources/' . $img);
                File::delete($file); 
            }catch(\exception $e){};
            $img -> delete(); 
        };
        $project -> delete();
        return redirect() -> back();
    }
    private function storeImage($img){
        $ext = $img -> getClientOriginalExtension();
        $name = rand(10000,99999) .'_'.time();
        $destfile = $name . '.' . $ext;
        $img -> storeAs('projects-resources' , $destfile ,'public');
        return $destfile;
    }
}
