<template>
data
    <slot :active="active" :toggleNav="toggleNav"></slot>
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
            this.active = !this.active;
        }
    },
}
</script>