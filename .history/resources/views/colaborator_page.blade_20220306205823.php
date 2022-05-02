@extends('layouts.template')

@section('page')

    {{ Auth::user()->name.' '.Auth::user()->birth_date  }}

@endsection