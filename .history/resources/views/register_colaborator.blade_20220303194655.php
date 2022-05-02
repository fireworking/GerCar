@extends('layouts.company_page')

@section('content')

    <register-colaborator v-slot="{submit, fields, v, serverErrors, success}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
        href-subtitle="/register-colaborator" :data="['email', 'password', 'confirm-password']" :success="success" 
        :logo="false">

        <template #title>Register Colaborators</template>
        <template #text_subtitle>An email will be sent to them informing their login credentials</template>
        <template #csrf>@csrf</template>
        <template #flash><flash></flash></template>

        </default-form>
    </register-colaborator>

@endsection