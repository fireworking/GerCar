@extends('layouts.template')

@section('page')

    <login v-slot="{submit, fields, v, serverErrors}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
        href-subtitle="/register-company" :data="['name', 'cpf']">

        <template #title>Login</template>
        <template #text_subtitle>Don't have an account? Ask your employer to register you or</template>
        <template #link_subtitle>register your company</template>
        <template #csrf>@csrf</template>

        </default-form>
    </login>

@endsection