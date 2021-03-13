@extends('app')
@section('content')
    <h1 class="text-center">Guías</h1>
    <h4>Número de guida generadas:</h4>
    <h5 id="guides_count">{{ $guides->count() }}</h5>
@endsection
