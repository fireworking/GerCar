@extends('layouts.colaborator_page')

@section('content')

    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="px-4 sm:px-6 lg:px-16">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-3xl font-semibold text-gray-900 pt-10">Vehicles</h1>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Brand</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">License Plate</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Color</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Owner</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($vehicles as $vehicle)
                <tr>
                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $vehicles->find(1)->name }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicle->brand }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicles->find(1)->plate }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicles->find(1)->color }}</td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $vehicles->find(1)->owner->name }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection