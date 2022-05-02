@extends('layouts.template')

@section('page')

    <register-company v-slot="{states, cities, defineCities, submit, fields, v, serverErrors}" v-cloak>
    <default-form :states="states" :cities="cities" :define-cities="defineCities" :submit="submit" 
      :fields="fields" :v="v" :server-errors="serverErrors" href-subtitle="/register-company"
      :data="['email', 'password']">

      <template #title>Login</template>
      <template #text_subtitle>Don't have an account?</template>
      <template #link_subtitle>Register your company</template>
      <template #csrf>@csrf</template>

    </default-form>
  </register-company>

@endsection