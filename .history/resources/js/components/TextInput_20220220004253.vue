<template>
    <label :for="field" class="block text-sm font-medium text-gray-700">
        {{ field.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
}) }}
    </label>
    <div class="mt-1">
        <input v-model="fields[field]" :id="field" :name="field" :type="field" :autocomplete="field" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
    </div>
</template>

<script>
export default {
    props: ['fields', 'field'],
}
</script>