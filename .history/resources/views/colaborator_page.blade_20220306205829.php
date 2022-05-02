@extends('layouts.template')

@section('page')

    {{ Auth::user()->name.' '.Auth::user()->typeable->birth_date  }}

@endsection