@extends('layouts.template')

@section('page')

    <fill-info v-slot="{submit, fields, v, serverErrors}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
            :data="['name', 'cpf', 'birth-date', 'phone-number']">

        <template #title>Finish your registration</template>
        <template #csrf>@csrf</template>
        <template #submit>Register</template>

        </default-form>
    </fill-info>

@endsection