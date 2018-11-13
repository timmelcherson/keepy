@extends('layouts.app')


@section('content')

<div class="container fill d-flex flex-column align-items-center scroll-y">

    <div class="jumbotron w-50 margin-8">

        <h1 class="text-center mb-4">Edit key</h1>

        <form method="POST" action="/editkey/{{ $key->id }}">

            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="room" class="label">Room</label>
                <input type="text" name="room" placeholder="Room" class="form-control {{ $errors->has('room') ? 'is-invalid' : '' }}"
                    value="{{ $key->room }}" required>
            </div>

            <div class="form-group">
                <label for="key_id" class="label">Key ID</label>
                <input type="text" name="key_id" placeholder="Room" class="form-control {{ $errors->has('key_id') ? 'is-invalid' : '' }}"
                    value="{{ $key->key_id }}" required>
            </div>

            <div class="form-group">
                <label for="keytype" class="label">Keytype</label>
                <input type="text" name="keytype" placeholder="Keytype" class="form-control {{ $errors->has('keytype') ? 'is-invalid' : '' }}"
                    value="{{ $key->keytype}}" required>
            </div>

            <div class="form-group">
                <label for="lost" class="label">Is key lost?</label>
                <select name="lost" class="custom-select">
                    @if ($key->lost == 1)
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    @else
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success mt-5">Edit key information</button>
            </div>

            @include('inc.messages')

        </form>
    </div>
</div>

@endsection
