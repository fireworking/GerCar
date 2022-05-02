<template>
    <div v-if="field.$error" class="sm:col-span-6 text-red-500 mt-0 text-sm">
        {{ field.$errors[0].$validator == 'required' ?
            'The ' + field.$errors[0].$property + ' field is required' : field.$errors[0].$message }}
    </div>
</template>

<script>
export default {
    props: ['field', 'serverErrors'],
}
</script>