@extends('layouts.app')

@section('content')


    <div class="container mt-5">
        {{-- Access compacted variable --}}
        <h1><?php echo $title; ?></h1>
        {{-- Or --}}
        <h1>{{$title}}</h1>
    </div>

@endsection