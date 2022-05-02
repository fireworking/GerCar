@extends('layouts.colaborator_page')

@section('content')

    <register-colaborator v-slot="{submit, fields, v, serverErrors, success}" v-cloak>
        <default-form :submit="submit" :fields="fields" :v="v" :server-errors="serverErrors" 
            :data="['name', 'brand', 'color', 'plate']" :success="success" :logo="false">

        <template #title>Add Vehicle</template>
        <template #csrf>@csrf</template>
        <template #flash><flash></flash></template>
        <template #submit>Add</template>

        </default-form>
    </register-colaborator>

@endsection