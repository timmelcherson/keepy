<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function createUser(Request $request)
    {
        // dd($user_id = auth()->user()->role == 'superuser');

        if ($user_id = auth()->user()->role == 'superuser'){
            
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $User = new User([
                'name' => request()->get('name'),
                'email' => request()->get('email'),
                'password' => Hash::make(request()->get('password')),
            ]);

            $User->save();
            
            Session::flash('alert-success', 'Successfully created user');
            return redirect()->back();   
        }
        else {
            Session::flash('alert-danger', 'Not authorized to create users');
            return redirect()->back();   
        }
    }


    public function editUserRights(Request $request)
    {

        $request->validate([
            'usersemail' => 'required',
        ]);

        $user = User::where('email', request()->get('usersemail'))->first();
        

        $user->update([
            'rights_add_key' => request()->get('rights_add_key'), 
            'rights_delete_key' => request()->get('rights_delete_key'),
            'rights_book_key' => request()->get('rights_book_key'),
            'rights_return_key' => request()->get('rights_return_key'),
            'rights_add_fob' => request()->get('rights_add_fob'),
            'rights_delete_fob' => request()->get('rights_delete_fob'),
            'rights_book_fob' => request()->get('rights_book_fob'),
            'rights_return_fob' => request()->get('rights_return_fob'),
        ]);

       

        Session::flash('alert-success', 'Successfully edited user rights');
        return redirect()->back();

    }


}
