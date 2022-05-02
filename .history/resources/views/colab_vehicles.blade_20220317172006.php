@extends('layouts.colaborator_page')

@section('content')

<vehicles :vehicles="{{ $vehicles }}" :owners="{{ $vehicles->all }}"></vehicles>

@endsection