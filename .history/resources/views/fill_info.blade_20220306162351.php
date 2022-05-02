@extends('layouts.template')

@section('page')

        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
        <a href="../logout" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-orange-600 hover:bg-orange-700"> Logout </a>
    </div>

    <fill-info v-slot="{submit, fields, v, serverErrors}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
            :data="['name', 'cpf', 'birth-date', 'phone-number']">

        <template #title>Finish your registration</template>
        <template #csrf>@csrf</template>
        <template #submit>Submit</template>

        </default-form>
    </fill-info>

@endsection