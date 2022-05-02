@extends('layouts.template')

@section('page')

  <div class="h-screen">
    <home v-slot="{windowWidth}">

        <back-image></back-image>
        <contact-box :window-width="windowWidth"></contact-box>
    </home>
  </div>

@endsection