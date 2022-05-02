<template>
    <styled-label :field='field'><slot></slot></styled-label>
    <div v-if="vm" class="mt-1">
        <TextField :server-errors="serverErrors" :fields="fields" :field="field" v-mask="vm" :tokens="plateTokens"></TextField>
    </div>
    <div v-else class="mt-1">
        <TextField :server-errors="serverErrors" :fields="fields" :field="field"></TextField>
    </div>
</template>

<script>
import TextField from './TextField.vue';
export default {
    props: ['fields', 'field', 'vm', 'serverErrors'],
    data() {
        return {
            plateTokens: {
                D: {
                    pattern: /[0-9a-zA-Z]/,
                    transform: v => v.toLocaleUpperCase()
                }
            }
        }
    },
    components: { TextField },

}
</script>