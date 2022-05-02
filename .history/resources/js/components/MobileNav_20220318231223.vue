<template>
    <slot :active="active" :></slot>
</template>

<script>
export default {
    data() {
        return {
            active: false
        }
    },
    methods: {
        toggleNav(){
            this.active = !this.active; p
        }
    },
}
</script>