<template>
    <label :for="field" class="block text-sm font-medium text-gray-700">
        <slot></slot>
    </label>
    <div v-if="vm" class="mt-1">
        <Text :fields="fields" :field="field" v-mask="vm"></Text>
    </div>
    <div v-else class="mt-1">
        <Text :fields="fields" :field="field"></Text>
    </div>
</template>

<script>
import Text from './TextField.vue';
export default {
    props: ['fields', 'field', 'vm'],
    components: { TextField }
}
</script>