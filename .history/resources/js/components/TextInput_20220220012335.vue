<template>
    <label :for="field" class="block text-sm font-medium text-gray-700">
        <slot></slot>
    </label>
    <div v-if="vm" class="mt-1">
        <text-box v-mask="vm"></text-box>
    </div>
    <div v-else class="mt-1">
        <textBox></text-box>
    </div>
</template>

<script>
import TextBox from './TextBox.vue';
export default {
    props: ['fields', 'field', 'vm'],
    components: { TextBox }
}
</script>