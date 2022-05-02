<template>
     <input v-model="fields[field]" :id="field" :name="field" :type="type" :autocomplete="field"
        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
</template>

<script>
export default {
    props: ['fields', 'field'],
    data() {
        return {
            type: this.field == 'confirm-password' ? 'password' : this.field,
            merged: this.field.map(e => { 
                return ((e == '-') ? ('') : ())
            })
        }
    },
}
</script>