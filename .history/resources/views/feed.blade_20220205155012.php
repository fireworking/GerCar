@extends('layouts.template')

@section('page')

    <div>{{ session()->get('name') }}</div>

@endsection
