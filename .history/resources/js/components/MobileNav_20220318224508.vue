<template>
    <slot :active></slot>
</template>

<script>
export default {
    data() {
        return {
            active: false
        }
    },
}
</script>