@extends('layouts.app')


@section('content')


<div class="flash-message statusMessage">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>


<div class="container fill d-flex align-items-center justify-content-center my-auto mx-0 p-0">


    <div class="dashboard d-flex align-items-center">
        <div class="list-group ml-5">
            <p class="dashboard-item" id="register-user">Register a new user</p>
            <p class="dashboard-item" id="edit-user-rights">Edit other users rights</p>
        </div>


        <div class="register-container m-3 w-75 h-75 justify-content-center" id="register-user">

            <div class="jumbotron bg-light text-center  w-50 p-5 border border-dark">

                <h1 class="text-center mb-4">Register a new user</h1>

                <form method="POST" action="/register">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-8">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-8">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-8">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                            Password') }}</label>

                        <div class="col-8 d-flex align-items-center">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="edit-rights-container m-3 w-75 h-75 justify-content-center" id="register-user">

            <div class="jumbotron bg-light text-center  w-75 p-5 border border-dark">

                <h1 class="text-center mb-4">Edit user rights</h1>

                <form method="POST" action="/edit-user-rights">
                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label for="usersemail" class="col-md-4 col-form-label text-md-right">{{ __('Users email') }}</label>

                        <div class="col-8">
                            <input id="usersemail" type="usersemail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="usersemail" value="{{ old('email') }}" placeholder="Users email" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="d-flex rights-container flex-row">

                        <div class="d-flex col p-0 keyrights-column flex-column">

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_add_key" class="col-6 col-form-label text-md-right">Add keys?</label>
                                <select name="rights_add_key" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_delete_key" class="col-6 col-form-label text-md-right">Delete keys?</label>
                                <select name="rights_delete_key" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_edit_key" class="col-6 col-form-label text-md-right">Edit keys?</label>
                                <select name="rights_edit_key" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_book_key" class="col-6 col-form-label text-md-right">Book keys?</label>
                                <select name="rights_book_key" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_return_key" class="col-6 col-form-label text-md-right">Return keys?</label>
                                <select name="rights_return_key" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex col p-0 fobrights-column flex-column">
                            
                            <div class="form-group row d-flex flex-row">
                                <label for="rights_add_fob" class="col-6 col-form-label text-md-right">Add fobs?</label>
                                <select name="rights_add_fob" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_delete_fob" class="col-6 col-form-label text-md-right">Delete fobs?</label>
                                <select name="rights_delete_fob" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_edit_fob" class="col-6 col-form-label text-md-right">Edit fobs?</label>
                                <select name="rights_edit_fob" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_book_fob" class="col-6 col-form-label text-md-right">Book fobs?</label>
                                <select name="rights_book_fob" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group row d-flex flex-row">
                                <label for="rights_return_fob" class="col-6 col-form-label text-md-right">Return fobs?</label>
                                <select name="rights_return_fob" class="custom-select col-4">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                        </div>      
                    </div>
                    

                    



                    <div class="form-group row mb-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
