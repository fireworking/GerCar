@extends('layouts.company_page')

@section('content')

<vehicles :vehicles="{{ $vehicles }}"></vehicles>

@endsection