@extends('layouts.colaborator_page')

@section('content')

    <register-colaborator v-slot="{submit, fields, v, serverErrors, success}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
            href-subtitle="/register-colaborator" :data="['email', 'password', 'confirm-password']" :success="success" 
            :logo="false">

        <template #title>Register Colaborators</template>
        <template #csrf>@csrf</template>
        <template #flash><flash></flash></template>
        <template #submit>Add</template>

        </default-form>
    </register-colaborator>

@endsection