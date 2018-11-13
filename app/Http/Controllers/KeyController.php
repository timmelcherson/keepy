<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Key;
use App\History;
use Carbon\Carbon;

class KeyController extends Controller
{
    //
    protected $table = 'keys';


    public function index()
    {

    }


    public function create(Request $request)
    {

        $request->validate([
            'room' => 'required',
            'key-id' => 'required',
            'keytype' => 'required'
        ]);

        $key = new Key([
            'room' => request()->get('room'),
            'key_id' => request()->get('key-id'),
            'keytype' => request()->get('keytype'),
        ]);

        $key->save();

       return redirect('/home');

    }


    public function store(Request $request)
    {

        

    }


    public function show()
    {
        
    }


    public function edit(Key $key)
    {

        return view('items.editkey', compact('key'));

    }


    public function toReservation(Key $key)
    {

        return view('items.reservekey', compact('key'));

    }


    public function update(Key $key, History $history, Request $request)
    {

        $currentPath= Route::getFacadeRoot()->current()->uri();

        if (strpos($currentPath, 'editkey') !== false){

            $key->update([
                'key_id' => request()->get('key_id'),
                'room' => request()->get('room'),
                'keytype' => request()->get('keytype'),
                'lost' => request()->get('lost'),
                ]);

        }
        elseif (strpos($currentPath, 'reserve') !== false){

            $key->update(request(['borrower', 'alocated_by']));
            $key->update(['available' => 0, 'borrowed_at' => Carbon::now()->toDateTimeString()]);
            
            $history = new History([
                'item_id' => $key->key_id,
                'item_type' => 'Key',
                'borrowed_at' => $key->borrowed_at,
            ]);

            $history->save();

        }
        elseif (strpos($currentPath, 'return') !== false){

            $key->update([
                'available' => 1,
                'borrower' => null,
                'alocated_by' => null,
                'returned_at' => Carbon::now()->toDateTimeString()]);

            $history = new History([
                'item_id' => $key->key_id,
                'item_type' => 'Key',
                'returned_at' => $key->returned_at,
            ]);

            $history->save(); 

        }
        
        
        return redirect('/home');
    }

    public function destroy(Key $key)
    {

        $key->delete();

        return redirect('/home');

    }
}
