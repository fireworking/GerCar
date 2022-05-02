<template>
    <styled-label :field='field'><slot></slot></styled-label>
    <div v-if="vm" class="mt-1">
        <TextField :fields="fields" :field="field" v-mask="vm"></TextField>
    </div>
    <div v-else class="mt-1">
        <TextField :fields="fields" :field="field"></TextField>
    </div>
</template>

<script>
import TextField from './TextField.vue';
export default {
    props: ['fields', 'field', 'vm', 'resetServerError'],
    components: { TextField }
}
</script>