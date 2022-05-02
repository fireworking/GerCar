@extends('layouts.template')

@section('page')

  <div class="h-screen">
    <home v-slot="{windowWidth}">
      
        <gray-box :window-width="windowWidth"></gray-box>
        <back-image></back-image>
        <contact-box :window-width="windowWidth"></contact-box>
    </home>
  </div>

@endsection