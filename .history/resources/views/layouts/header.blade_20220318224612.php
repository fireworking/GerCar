@extends('layouts.template')

@section('page')

  <div class="relative bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="/">
            <img class="h-8 w-auto sm:h-16 border-2 rounded-full border-orange-500 p-2" src="../img/car.png" alt="">
          </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
          <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/menu -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
        <nav class="hidden md:flex space-x-10">
  
          <a href="/vehicles" class="text-base p-2 {{ $page == 'vehicles' ? 'border-2 border-orange-500 rounded-2xl text-orange-500' : 'text-gray-500 hover:text-gray-900' }} font-medium"> Vehicles </a>
          <a href="/add-vehicle" class="text-base p-2 {{ $userType == 'company' ? 'hidden' : '' }} {{ $page == 'add_vehicles' ? 'border-2 border-orange-500 rounded-2xl text-orange-500' : 'text-gray-500 hover:text-gray-900' }} font-medium"> Add Vehicle </a>
          <a href="/register-colaborator" class="text-base p-2 {{ $userType == 'colaborator' ? 'hidden' : '' }} {{ $page == 'colaborators' ? 'border-2 border-orange-500 rounded-2xl text-orange-500' : 'text-gray-500 hover:text-gray-900' }} font-medium"> Colaborators </a>
        </nav>
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
          <a href="../logout" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-orange-600 hover:bg-orange-700"> Logout </a>
        </div>
      </div>
    </div>
  
    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
          <div class="flex items-center justify-between">
            <div>
              <img class="h-16 w-auto border-2 p-2 rounded-full border-orange-500" src="../img/car.png" alt="Workflow">
            </div>
            <div class="-mr-2">
              <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          <mobile-nav>

          </mobile-nav>
        </div>
        <div class="py-16 px-5 space-y-6">
          <div>
            <a href="../logout" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-orange-600 hover:bg-orange-700"> Logout </a>
          </div>
        </div>
      </div>
    </div>
    @yield('content')
  </div>
  

@endsection
