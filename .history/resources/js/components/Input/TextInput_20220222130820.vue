<template>
    <label :for="field" class="block text-sm font-medium text-gray-700">
        <slot></slot>
    </label>
    <div v-if="vm" class="mt-1">
        <TextBox :fields="fields" :field="field" v-mask="vm"></TextBox>
    </div>
    <div v-else class="mt-1">
        <TextBox :fields="fields" :field="field"></TextBox>
    </div>
</template>

<script>
import TextBox from './TextBox.vue';
export default {
    props: ['fields', 'field', 'vm'],
    components: { TextBox }
}
</script>