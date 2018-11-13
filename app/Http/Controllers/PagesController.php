<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Key;
use App\Fob;
use App\History;



class PagesController extends Controller
{

    /* public function __construct(){
        $this->middleware('auth');
    } */


    public function index()
    {   

        $title = 'Welcome to keepy!';

        if (Auth::guest()){
            return view('pages.index');
        }
        else {
            return redirect('home');
        }

    }


    public function home()
    {

        $title = "Keepy home";
        $keys = Key::all();
        $rooms = Key::select('room')->distinct()->get();
        $fobs = Fob::all();
        $history = History::orderBy('id', 'desc')->get();


        return view('home')->with([
            'title' => $title, 
            'keys' => $keys, 
            'rooms' => $rooms,
            'fobs' => $fobs,
            'history' => $history,
            ]);    
    }


    public function about()
    {

        $title = 'About Us';
        
        return view('pages.about')->with('title', $title);
    
    }


    public function addKey(){

        if ($user_id = auth()->user()->rights_add_key == 0){
            Session::flash('alert-danger', 'Not authorized to add keys');
            return redirect()->back();
            
        }
        else {
            return view('items.addkey');
        }

    }


    public function addFob(){

        if ($user_id = auth()->user()->rights_add_fob == 0){
            Session::flash('alert-danger', 'Not authorized to add fobs');
            return redirect()->back();
        }
        else {
            return view('items.addfob');
        }

    }


    public function dashboard()
    {

        return view('pages.dashboard');

    }


    public function register()
    {

        return view('pages.register');

    }


}
