@extends('layouts.app')


@section('content')

<div class="container fill d-flex flex-column align-items-center scroll-y">

    <div class="jumbotron w-50 margin-8">

        <h1 class="text-center mb-4">Edit fob</h1>
        
        <form method="POST" action="/editfob/{{ $fob->id }}">

            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="fob_id" class="label">Fob ID</label>
                <input type="text" name="fob_id" placeholder="Fob Id" class="form-control {{ $errors->has('fob_id') ? 'is-invalid' : '' }}"
                    value="{{ $fob->fob_id }}" required>
            </div>

            <div class="form-group">
                <label for="lost" class="label">Is fob lost?</label>
                <select name="lost" class="custom-select">
                    @if ($fob->lost == 1)
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    @else
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success mt-5">Edit fob information</button>
            </div>

            @include('inc.messages')

        </form>
    </div>
</div>

@endsection
