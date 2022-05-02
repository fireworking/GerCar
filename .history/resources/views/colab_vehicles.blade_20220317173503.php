@extends('layouts.colaborator_page')

@section('content')

<vehicles :vehicles="{{ $vehicles }}" :owners="{{ $vehicles->pluck('owner') }}" :mine="{{ $vehicles->where($user) }}"></vehicles>

@endsection