<template>
    <styled-label :field='field'><slot></slot></styled-label>
    <div v-if="vm" class="mt-1">
        <TextField :server-errors="serverErrors" :fields="fields" :field="field" v-mask="vm" :tokens="tokens"></TextField>
    </div>
    <div v-else class="mt-1">
        <TextField :server-errors="serverErrors" :fields="fields" :field="field"></TextField>
    </div>
</template>

<script>
import TextField from './TextField.vue';
export default {
    props: ['fields', 'field', 'vm', 'serverErrors'],
    components: { TextField },

}
</script>