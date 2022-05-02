@extends('layouts.template')

@section('page')

    <a href="../logout" class=""> Logout </a>

    <fill-info v-slot="{submit, fields, v, serverErrors}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
            :data="['name', 'cpf', 'birth-date', 'phone-number']">

        <template #title>Finish your registration</template>
        <template #csrf>@csrf</template>
        <template #submit>Submit</template>

        </default-form>
    </fill-info>

@endsection