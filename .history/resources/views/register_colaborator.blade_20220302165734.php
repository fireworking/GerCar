@extends('layouts.template')

@section('page')

    <register-colaborator v-slot="{submit, fields, v, serverErrors}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
        href-subtitle="/register-colaborator" :data="['email', 'password', 'confirm-password']">

        <template #title>Register Colaborators</template>
        <template #text_subtitle>An email will be sent to them informing their login credentials</template>
        <template #csrf>@csrf</template>
        <template #flash></template>

        </default-form>
    </register-colaborator>

@endsection