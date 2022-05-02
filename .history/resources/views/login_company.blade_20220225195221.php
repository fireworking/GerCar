@extends('layouts.template')

@section('page')

    <login-company v-slot="{submit, fields, v, serverErrors}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :servererrors="serverErrors" 
        href-subtitle="/register-company" :data="['email', 'password']">

        <template #title>Login</template>
        <template #text_subtitle>Don't have an account?</template>
        <template #link_subtitle>Register your company</template>
        <template #csrf>@csrf</template>

        </default-form>
    </login-company>

@endsection