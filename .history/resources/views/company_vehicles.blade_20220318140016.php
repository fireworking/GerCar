@extends('layouts.header')

@section('content')

<vehicles :vehicles="{{ $vehicles }}" :owners="{{ $vehicles->pluck('owner') }}"></vehicles>

@endsection