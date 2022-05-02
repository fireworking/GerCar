@extends('layouts.template')

@section('page')

  <register-company v-slot="{states, cities, defineCities, submit, fields, v, serverErrors}" v-cloak>
    <default-form :states="states" :cities="cities" :define-cities="defineCities" :submit="submit" 
      :fields="fields" :v="v" :server-errors="serverErrors" href-subtitle="/login-company"
      :data="['name', 'state', 'cnpj', 'city', 'email', 'password', 'confirm-password', 'terms-of-service']">

      <template #title>Register Company</template>
      <template #text_subtitle>Already has an account?</template>
      <template #link_subtitle>Login</template>
      <template #csrf>@csrf</template>

    </default-form>
  </register-company>

 
@endsection