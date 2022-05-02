<template>
    <label :for="field" class="block text-sm font-medium text-gray-700">
        <slot></slot>
    </label>
    <div v-if="vm" class="mt-1">
        <input v-model="fields[field]" :id="field" :name="field" :type="field" :autocomplete="field" v-mask="vm"
            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
    </div>
    <div v-else class="mt-1">
        <input v-model="fields[field]" :id="field" :name="field" :type="field" :autocomplete="field"
            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
    </div>
</template>

<script>
import Text
export default {
    props: ['fields', 'field', 'vm'],
    components: { TextInput }
}
</script>