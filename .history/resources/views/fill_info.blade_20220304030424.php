@extends('layouts.template')

@section('page')

    <login v-slot="{submit, fields, v, serverErrors}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
         :data="['name', 'cpf', 'birth_date', 'phone_number']">

        <template #title>Finish your registration</template>
        <template #csrf>@csrf</template>

        </default-form>
    </login>

@endsection