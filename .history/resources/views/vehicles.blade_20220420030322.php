@extends('layouts.header')

@section('content')

<vehicles v-cloak :vehicles="{{ $vehicles }}" :companies="{{ $vehicles->pluck('company') }}" :owners="{{ $vehicles->pluck('owner') }}" 
    @if($userType == 'colaborator') 
        :mine="Object.values({{ $vehicles->where('owner_id', $user->id) }})" 
    @else
        :mine="Object.values({{ $vehicles->where('owner_id', $user->id) }})" 
    @endif></vehicles>

@endsection