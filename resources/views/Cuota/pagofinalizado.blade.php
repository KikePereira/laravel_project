@extends('layouts.app')

@section('content')

<div class="container text-center">
    <span class="fw-bold border border-2 border-dark bg-white p-3">{{$status}}</span>
    <br>
    <a href="/cuota" class="btn btn-primary form-control mt-5">Volver</a>
</div>

@endsection