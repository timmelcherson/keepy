@extends('layouts.app')


@section('content')

<div class="container fill d-flex flex-column align-items-center">

    <div class="jumbotron w-50 margin-8">

        <h1 class="text-center mb-4">Reserve key</h1>

        <form method="POST" action="/reserve/{{ $key->id }}">

            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="borrower" class="label">Borrower</label>
                <input type="text" name="borrower" placeholder="Name of borrower" class="form-control {{ $errors->has('borrower') ? 'is-invalid' : '' }}"
                    value="{{ $key->borrower }}" required>
            </div>

            <div class="form-group">
                <label for="alocated_by" class="label">Allocator</label>
                <input type="text" name="alocated_by" placeholder="Name of Allocator" class="form-control {{ $errors->has('alocated_by') ? 'is-invalid' : '' }}"
                    value="{{ $key->alocated_by }}" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success mt-5">Reserve key</button>
            </div>

            @include('inc.messages')

        </form>
    </div>
</div>

@endsection
