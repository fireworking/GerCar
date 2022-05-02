@extends('layouts.template')

@section('page')

    <register-company v-slot="{states, cities, defineCities, submit, fields, v, serverErrors}" v-cloak>
        <div class="min-h-full flex flex-col justify-center py-4 sm:py-8 sm:px-16 lg:px-20">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img src="img/car.png" class="w-20 m-auto p-1 border rounded-full border-orange-500">      
            <h2 class="mt-1 sm:mt-3 text-center text-3xl font-extrabold text-gray-900">
            Login Company
            </h2>
            <p class="mt-1 sm:mt-2 text-center text-sm text-gray-600">
            Don't have an account?
            <a href="#" class="font-medium text-orange-600 hover:text-orange-500">
                Register your company
            </a>
            </p>
        </div>
        <div class="sm:mt-2 sm:mx-auto sm:w-full sm:max-w-xl">
            <div class="bg-white py-2 sm:pb-4 sm:pt-1 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" v-on:submit.prevent="submit" action="/register-company" method="POST">
                @csrf
                <div class="grid gap-y-6 gap-x-4 sm:grid-cols-6">

   
                <div>
                <text-input :fields="fields" field="email">Email Address</text-input>
                <error :field="v.fields.email" :server-error="serverErrors.email"></error>
                </div>
            
                <div>
                <text-input :fields="fields" field="password">Password</text-input>
                <error :field="v.fields.password"></error>
                </div>

                <div>
                <text-input :fields="fields" field="confirm-password">Confirm Password</text-input>
                <error :field="v.fields.confirmPassword"></error>
                </div>
            
                <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input v-model="fields.termsOfService" id="terms-of-service" name="terms-of-service" type="checkbox" class="w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
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