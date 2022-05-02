<template>
    <slot :active="active" :toggleNav="to"></slot>
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