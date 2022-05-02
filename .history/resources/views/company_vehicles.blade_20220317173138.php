@extends('layouts.company_page')

@section('content')

<vehicles :original-vehicles="{{ $vehicles }}" :owners="{{ $vehicles->pluck('owner') }}"></vehicles>

@endsection