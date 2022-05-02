@extends('layouts.template')

@section('page')

    <login-company v-slot="{submit, fields, v, serverErrors}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
        href-subtitle="/register-colabor" :data="['email', 'password']">

        <template #title>Register Colaborators</template>
        <template #text_subtitle>An email will be sent to them informing their login credentials</template>
        <template #csrf>@csrf</template>

        </default-form>
    </login-company>

@endsection