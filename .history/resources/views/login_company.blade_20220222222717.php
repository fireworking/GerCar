@extends('layouts.template')

@section('page')

    <register-company v-slot="{states, cities, defineCities, submit, fields, v, serverErrors}" v-cloak>
        <div class="min-h-full flex flex-col justify-center py-16 sm:py-20 sm:px-16 lg:px-20">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <img src="img/car.png" class="w-20 m-auto p-1 border rounded-full border-orange-500">      
                <h2 class="mt-1 sm:mt-3 text-center text-3xl font-extrabold text-gray-900">
                Login Company
                </h2>
                <p class="mt-1 sm:mt-2 text-center text-sm text-gray-600">
                Don't have an account?
                <a href="/register-company" class="font-medium text-orange-600 hover:text-orange-500">
                    Register your company
                </a>
                </p>
            </div>
            <div class="sm:mt-2 sm:mx-auto sm:w-full sm:max-w-xl">
                <div class="bg-white  pb-4 sm:pb-4 sm:pt-1 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" v-on:submit.prevent="submit" action="/login-company" method="POST">
                    @csrf
                    <div class="grid gap-y-6 gap-x-4 sm:grid-cols">

                        <div>
                            <text-input :fields="fields" field="email">Email Address</text-input>
                            <error :field="v.fields.email" :server-error="serverErrors.email"></error>
                        </div>
                    
                        <div>
                            <text-input :fields="fields" field="password">Password</text-input>
                            <error :field="v.fields.password"></error>
                        </div>
                    </div>
                    <div>
                        <button id="register" type="submit" class="w-full mb-4 mt-8 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Login
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </register-company>

@endsection