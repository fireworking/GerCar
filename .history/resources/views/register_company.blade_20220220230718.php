@extends('layouts.template')

@section('page')


  <register-company v-slot="{states, cities, defineCities, submit, fields, v, serverErrors}" v-cloak>
    <div class="min-h-full flex flex-col justify-center py-4 sm:py-8 sm:px-16 lg:px-20">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img src="img/car.png" class="w-20 m-auto p-1 border rounded-full border-orange-500">      
        <h2 class="mt-1 sm:mt-3 text-center text-3xl font-extrabold text-gray-900">
          Register Company
        </h2>
        <p class="mt-1 sm:mt-2 text-center text-sm text-gray-600">
          Already has an account?
          <a href="#" class="font-medium text-orange-600 hover:text-orange-500">
              LogIn
          </a>
        </p>
      </div>
      <div class="sm:mt-2 sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="bg-white py-2 sm:pb-4 sm:pt-1 px-4 shadow sm:rounded-lg sm:px-10">
          <form class="space-y-6" v-on:submit.prevent="submit" action="/register-company" method="POST">
            @csrf
            <div class="grid gap-y-6 gap-x-4 sm:grid-cols-6">
              <div class="sm:col-span-5">
                <text-input :fields="fields" field="name">Name</text-input>
                <error :field="v.fields.name" :serverErrors="serverErrors.name"></error>
                <error :field="v.fields.state"></error>
              </div>
              <div class="sm:col-span-1">
                <label for="state" class="block text-sm font-medium text-gray-700">
                  State
                </label>
                <select v-model="fields.state" id="state" v-on:change="defineCities($event.target.value)" name="state" autocomplete="state-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                  <option value="" selected hidden>##</option>
                  <option v-for="{id, uf} in states" :key="id" :value="uf">@{{ uf }}</option>
                </select>
              </div>
              <div class="sm:col-span-3">
                <text-input :fields="fields" field="cnpj" :vm="['###.###.###-##', '##.###.###/####-##']">CNPJ</text-input>
                <error :field="v.fields.cnpj" :serverError="serverErrors.cnpj"></error>
              </div>
        
              <div class="sm:col-span-3">
                <label for="city" class="block text-sm font-medium text-gray-700">
                  City
                </label>
                <select v-model="fields.city" id="city" name="city" autocomplete="city-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                  <option value="" selected hidden v-if="!cities?.length">--Choose a state--</option>
                  <option v-for="({name}, index) in cities" :key="index" :value="name">@{{ name }}</option>
                </select>
                <error :field="v.fields.city"></error>
              </div>
            </div>
        
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">
                Email Address
              </label>
              <div class="mt-1">
                <input v-model="fields.email" id="email" name="email" type="text" autocomplete="email-name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
              </div>
              <error :field="v.fields.email" :serverError="serverErrors.email"></error>
            </div>
        
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">
                Password
              </label>
              <div class="mt-1">
                <input v-model="fields.password" id="password" name="password" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
              </div>
              <error :field="v.fields.password"></error>
            </div>

            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">
                Confirm Password
              </label>
              <div class="mt-1">
                <input v-model="fields.confirmPassword" id="confirm-password" name="confirm-password" type="password" autocomplete="confirm-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
              </div>
              <error :field="v.fields.confirmPassword"></error>
            </div>
        
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input v-model="fields.termsOfService" @if(old('terms-of-service')) checked @endif id="terms-of-service" name="terms-of-service" type="checkbox" class="w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                <label for="terms-of-service" class="ml-2 block text-sm text-gray-900">
                  By checking this box, you are agreeing to our terms of service.
                </label>
              </div>
            </div>
            <span v-if="v.fields.termsOfService.$error" class="text-red-500 mt-0 text-sm">You must check the box to continue.</span>      
            <div>
              <button id="register" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Register
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </register-company>

 
@endsection