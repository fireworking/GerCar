@extends('layouts.template')

@section('page')

    @dd($user->company)

    <div>{{ $user->name }}</div>

@endsection
