<template>
    <div>aa</
</template>

<script>
export default {
    data() {
        return {
            windowWidth : 0
        }
    },
    mounted() {
        setInterval(() => {
            this.windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        }, 100);
    },
}
</script>