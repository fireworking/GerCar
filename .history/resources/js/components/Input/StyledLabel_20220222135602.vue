<template>
    <label :for="field" class="block text-sm font-medium text-gray-700"><slot></slot></label>
</template>

<script>
export default {
    props: ['field']
}
</script>