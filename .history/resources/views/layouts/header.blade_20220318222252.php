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
          <div class="mt-16">
            <nav class="grid gap-y-8">
              <a href="/vehicles" class="-m-3 p-3 {{ $page == 'vehicles' ? 'border-2 border-orange-500 rounded-2xl text-orange-500' : 'text-gray-500 hover:text-gray-900' }} flex items-center rounded-md hover:bg-gray-50">
                <svg class="h-6 w-6 text-orange-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  
                  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="7" cy="17" r="2" />  <circle cx="17" cy="17" r="2" />  <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
                </svg>
                <span class="ml-3 text-lg font-medium"> Vehicles </span>
              </a>

              <a href="/add-vehicle" class="-m-3 p-3 {{ $userType == 'company' ? 'hidden' : '' }} flex items-center rounded-md hover:bg-gray-50">
                <svg class="h-6 w-6 text-orange-600"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  
                  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" />
                </svg>
                <span class="ml-3 text-lg font-medium text-gray-900"> Add Vehicle </span>
              </a>

              <a href="/add-vehicle" class="-m-3 p-3 {{ $userType == 'colaborator' ? 'hidden' : '' }} flex items-center rounded-md hover:bg-gray-50">
                <svg class="h-6 w-6 text-orange-600"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  
                  <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />  <circle cx="8.5" cy="7" r="4" />  <line x1="20" y1="8" x2="20" y2="14" />  <line x1="23" y1="11" x2="17" y2="11" />
                </svg>
                <span class="ml-3 text-lg font-medium text-gray-900"> Colaborators </span>
              </a>
            </nav>
          </div>
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
