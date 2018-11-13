<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Fob;
use App\History;
use Carbon\Carbon;

class FobController extends Controller
{
    //
    protected $table = 'fobs';


    public function index()
    {

    }


    public function create(Request $request)
    {

        $request->validate([
            'fob-id' => 'required',
        ]);

        $fob = new fob([
            'fob_id' => request()->get('fob-id'),
        ]);

        $fob->save();

       return redirect('/home');

    }


    public function store(Request $request)
    {

        

    }


    public function show()
    {
        
    }


    public function edit(Fob $fob)
    {

        return view('items.editfob', compact('fob'));

    }


    public function toReservation(Fob $fob)
    {

        return view('items.reservefob', compact('fob'));

    }

    public function update(Fob $fob, Request $request)
    {

        $currentPath= Route::getFacadeRoot()->current()->uri();

        if (strpos($currentPath, 'editfob') !== false){

            $fob->update([
                'fob_id' => request()->get('fob_id'),
                'lost' => request()->get('lost'),
            ]);

        }
        elseif (strpos($currentPath, 'reserve') !== false){

            $fob->update(request(['borrower', 'alocated_by']));
            $fob->update([
                'available' => 0, 
                'borrowed_at' => Carbon::now()->toDateTimeString()
                ]);

            $history = new History([
                'item_id' => $fob->fob_id,
                'item_type' => 'Fob',
                'borrowed_at' => $fob->borrowed_at,
            ]);

            $history->save();  

        }
        elseif (strpos($currentPath, 'return') !== false){
            
            $fob->update([
                'available' => 1,
                'borrower' => null,
                'alocated_by' => null,
                'returned_at' => Carbon::now()->toDateTimeString()
                ]);

            $history = new History([
                'item_id' => $fob->fob_id,
                'item_type' => 'Fob',
                'returned_at' => $fob->returned_at,
            ]);

            $history->save();  
        }
        
        return redirect('/home');

    }


    public function destroy(Fob $fob)
    {

        $fob->delete();

        return redirect('/home');

    }
}
