@extends('layouts.app')

@section('content')


<div class="container fill d-flex flex-column align-items-center scroll-hidden">

    <div class="jumbotron w-50 margin-8">

        <h1 class="text-center mb-4">Add new key</h1>

        <form action="/addkey" method="POST" class="p-2 border-top border-dark">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="room" class="label">Room</label>
                <input type="text" name="room" placeholder="Room" class="form-control {{ $errors->has('room') ? 'is-invalid' : '' }}"
                    value="{{ old('room') }}" required>
            </div>

            <div class="form-group">
                <label for="key-id" class="label">Key ID</label>
                <input type="text" name="key-id" placeholder="Room" class="form-control {{ $errors->has('key-id') ? 'is-invalid' : '' }}"
                    value="{{ old('key-id') }}" required>
            </div>

            <div class="form-group">
                <label for="keytype" class="label">Keytype</label>
                <input type="text" name="keytype" placeholder="Keytype" class="form-control {{ $errors->has('keytype') ? 'is-invalid' : '' }}"
                    value="{{ old('keytype') }}" required>
            </div>

            {{-- <div class="form-group">
                <label for="amount" class="label">Number of keys to add</label>
                <select name="amount" class="custom-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div> --}}

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success mt-5">Add to keylist</button>
            </div>

            @include('inc.messages')

        </form>

    </div>


</div>


@endsection
