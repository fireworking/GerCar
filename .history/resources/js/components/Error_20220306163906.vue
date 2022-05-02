<template>
    <div v-if="field.$error" class="sm:col-span-6 text-red-500 mt-1 text-sm">
        {{ field.$errors[0].$validator == 'required' ?
            'The ' + field.$errors[0].$property + ' field is required' : field.$errors[0].$message }}
    </div>
    <div v-if="serverError" class="sm:col-span-6 text-red-500 mt-0 text-sm">
        {{ serverError[0] }}
    </div>
</template>

<script>
export default {
    props: ['field', 'serverError'],
    data() {
        return {
            property:''
        }
    },
}
</script>