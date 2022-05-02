@extends('layouts.template')

@section('page')

    @dd($user->cnpj)

    <div>{{ $user->name }}</div>

@endsection
