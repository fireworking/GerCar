<template>
    <div :class="'absolute bottom-10 text-white rounded-xl bg-green' + 
        (windowWidth < 640 ? 'p-5 left-1/2 transform -translate-x-1/2' : 'p-10 right-20')">
        Success
    </div>
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