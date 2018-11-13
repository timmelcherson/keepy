@extends('layouts.app')

@section('content')


<div class="container fill d-flex flex-column align-items-center scroll-hidden">

    <div class="jumbotron w-50 margin-8">

        <h1 class="text-center mb-4">Add new fob</h1>

        <form action="/addfob" method="POST" class="p-2 border-top border-dark">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="fob-id" class="label">Fob ID</label>
                <input type="text" name="fob-id" placeholder="Fob Id" class="form-control {{ $errors->has('fob-id') ? 'is-invalid' : '' }}"
                    value="{{ old('fob-id') }}" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success mt-5">Add to foblist</button>
            </div>

            @include('inc.messages')

        </form>

    </div>


</div>


@endsection
