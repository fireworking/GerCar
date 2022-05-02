@extends('layouts.template')

@section('page')

    @dd($user->typeable)

    <div>{{ $user->name }}</div>

@endsection
