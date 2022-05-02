<template>
    <label :for="field" class="block text-sm font-medium text-gray-700">
        Name
    </label>
    <div class="mt-1">
        <input v-model="fields[field]" id="name" name="name" type="name" autocomplete="name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
    </div>
</template>

<script>
export default {
    props: ['field'],
}
</script>