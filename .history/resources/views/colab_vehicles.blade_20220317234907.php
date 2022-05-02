@extends('layouts.colaborator_page')

@section('content')

<vehicles :vehicles="{{ $vehicles }}" :owners="{{ $vehicles->pluck('owner') }}" 
  :mine="Object{{ $vehicles->where('owner_id', $user->id) }}"></vehicles>

@endsection