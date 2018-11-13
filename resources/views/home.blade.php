@extends('layouts.app')

@section('content')

<div class="flash-message statusMessage">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>

<div class="container fill d-flex flex-column row-text">

    <div class="container opaque-bg w-90 mt-10 pb-3 px-5">

        {{-- Navigation tabs --}}
        <div class="row d-flex">
            <div class="col-4 rounded-top mb-4 p-2 text-center shadow-sm pointer tab-text selected-tab" id="keylist-tab">
                Key list
            </div>
            <div class="col-4 rounded-top mb-4 p-2 text-center shadow-sm pointer tab-text" id="foblist-tab">
                Fob list
            </div>
            <div class="col-4 rounded-top mb-4 p-2 text-center shadow-sm pointer tab-text" id="history-tab">
                History
            </div>

            {{-- @include('pages.keylist') --}}
            {{-- Section for the keylist --}}
            <div class="w-100 page-content" id="keylist-container">
                @foreach ($rooms as $room)

                <div class="room-container" id="room-{{$room->room}}">

                    {{-- Keylist room entry --}}
                    <div class="row w-100 border border-dark keyrow rounded textrow-style p-3 mx-0">
                        <div class="col">
                            {{ $room->room }}
                        </div>
                    </div>

                    {{-- Information for the room entry, items visible on click on room entry --}}

                    <div class="items-for-room">

                        <div class="row  w-97 bg-light mx-2 item-room-headers">
                            <div class="col-1">
                                Key-ID
                            </div>
                            <div class="col-1">
                                Keytype
                            </div>
                            <div class="col-1">
                                Available
                            </div>
                            <div class="col-2">
                                Borrower
                            </div>
                            <div class="col-2">
                                Allocated by
                            </div>

                            <div class="col d-flex justify-content-end mr-3">
                                <p class=m-0>Actions</p>
                            </div>
                        </div>

                        @foreach ($keys as $key)
                        @if ($key->room == $room->room)
                        <div class="row w-97 bg-light item-text p-1 mx-2 align-items-center">
                            <div class="col-1">
                                {{ $key->key_id }}
                            </div>
                            <div class="col-1">
                                {{ $key->keytype }}
                            </div>
                            <div class="col-1">
                                @if ($key->available)
                                <p class="m-0 d-inline">Yes</p>
                                @else
                                <p class="m-0 d-inline">No</p>

                                    @if ($key->lost)
                                    <p class="m-0 d-inline text-danger">LOST!</p>
                                    @endif

                                @endif

                            </div>
                            <div class="col-2">
                                @if ($key->borrower)
                                {{ $key->borrower }}
                                @else
                                <p class="m-0"> No one </p>
                                @endif
                            </div>
                            <div class="col-2">
                                @if ($key->alocated_by)
                                {{ $key->alocated_by }}
                                @else
                                <p class="m-0">No one</p>
                                @endif
                            </div>
                            <div class="col d-flex wrap-content justify-content-end">

                                @if (Auth::user()->rights_book_key)
                                    <a href="/reserve/{{ $key->id }}" class="btn btn-sm btn-primary btn-text mr-1
                                    {{ !($key->available) ? 'disabled' : '' }}"
                                    aria-disabled="{{ !($key->available) ? 'true' : 'false' }}">Book</a>
                                @endif

                                @if (Auth::user()->rights_return_key)
                                    <form method="POST" action="/return/{{ $key->id }}" class="m-0 p-0 d-flex justify-content-end">

                                        @method('PATCH')
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-secondary btn-text mr-1"
                                            {{ $key->available ? 'disabled' : '' }}>Return</button>
                                    </form>
                                @endif

                                

                                @if (Auth::user()->rights_edit_key)
                                    <a href="/edit/{{ $key->id }}" class="btn btn-sm btn-success btn-text mr-1">Edit</a>
                                @endif

                                

                                @if (Auth::user()->rights_delete_key)
                                    <form method="POST" action="/delete/{{ $key->id }}" class="m-0 p-0 d-flex justify-content-end">

                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-danger btn-text mr-1">Delete</button>
                                    </form>
                                @endif                            
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                </div>

                @endforeach

            </div>



            {{-- @include('pages.foblist') --}}
            {{-- Section for the foblist --}}
            <div class="w-100 d-none" id="foblist-container">
                <div class="room-container" id="room-N333">
                    <div class="row w-100 border border-dark keyrow rounded textrow-style p-2 mx-0">
                        <div class="col-2">
                            Fob Id
                        </div>
                        <div class="col-2">
                            Available
                        </div>
                        <div class="col-2">
                            Borrower
                        </div>
                        <div class="col-2">
                            Allocated by
                        </div>
                        <div class="col d-flex justify-content-end mr-3">
                            <p class=m-0>Actions</p>
                        </div>
                    </div>

                    <div class="">
                        @foreach ($fobs as $fob)
                        <div class="row w-97 bg-light item-text p-1 mx-2 align-items-center">
                            <div class="col-2">
                                {{ $fob->fob_id }}
                            </div>

                            <div class="col-2">
                                @if ($fob->available)
                                    <p class="m-0 d-inline">Yes</p>
                                @else
                                    <p class="m-0 d-inline">No</p>

                                    @if ($fob->lost)
                                        <p class="m-0 d-inline text-danger">LOST!</p>
                                    @endif

                                @endif

                            </div>
                            <div class="col-2">
                                @if ($fob->borrower)
                                    {{ $fob->borrower }}
                                @else
                                    <p class="m-0"> No one </p>
                                @endif
                            </div>
                            <div class="col-2">
                                @if ($fob->alocated_by)
                                {{ $fob->alocated_by }}
                                @else
                                <p class="m-0">No one</p>
                                @endif
                            </div>
                            <div class="col d-flex wrap-content justify-content-end">

                                @if (Auth::user()->rights_book_fob)
                                    <a href="/reservefob/{{ $fob->id }}" class="btn btn-sm btn-primary btn-text mr-1
                                    {{ !($fob->available) ? 'disabled' : '' }}"
                                    aria-disabled="{{ !($fob->available) ? 'true' : 'false' }}">Book</a>
                                @endif

                                

                                @if (Auth::user()->rights_return_fob)
                                    <form method="POST" action="/returnfob/{{ $fob->id }}" class="m-0 p-0 d-flex justify-content-end">

                                        @method('PATCH')
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-secondary btn-text mr-1"
                                            {{ $fob->available ? 'disabled' : '' }}>Return</button>
                                    </form>
                                @endif

                                

                                @if (Auth::user()->rights_edit_fob)
                                    <a href="/editfob/{{ $fob->id }}" class="btn btn-sm btn-success btn-text mr-1">Edit</a>
                                @endif

                                

                                @if (Auth::user()->rights_delete_fob)
                                    <form method="POST" action="/deletefob/{{ $fob->id }}" class="m-0 p-0 d-flex justify-content-end">

                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-danger btn-text mr-1">Delete</button>
                                    </form>
                                @endif              
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>


            {{-- @include('pages.history') --}}
            {{-- Section for the history list --}}
            <div class="w-100 d-none" id="history-container">

                @foreach ($history as $entry)
                    @if ($entry->borrowed_at !== null)
                        <div class="row border border-dark keyrow-style history-borrowed rounded textrow-style p-1 mx-0">
                            <p class="m-0">{{ $entry->item_type }} with id {{ $entry->item_id}} is borrowed at {{ $entry->borrowed_at}}</p>   
                        </div>
                    @endif
                    @if ($entry->returned_at !== null)
                        <div class="row border border-dark keyrow-style history-returned rounded textrow-style p-1 mx-0">
                            <p class="m-0">{{ $entry->item_type }} with id {{ $entry->item_id}} is returned at {{ $entry->returned_at}}</p>
                        </div>  
                    @endif
                @endforeach

            </div>

        </div>

    </div>

</div>


@endsection
