<template>
    <div :class="'absolute bottom-10 text-white rounded-xl ' + 
    (windowWidth < 640 ? 'p-5 left-1/2 transform -translate-x-1/2' : 'p-10 right-20')"
    style="background-color: rgba(0,0,0,0.7)">
        <dd class="flex">
            <svg class="flex-shrink-0 w-4 h-4 text-orange-200 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            <span class="ml-2">Phone: <span class="whitespace-nowrap">(10) 98765-4321</span></span>
        </dd>
        <dd class="flex">
            <svg class="flex-shrink-0 w-4 h-4 text-orange-200 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span class="ml-2">Email: suport@gercle.com</span>
        </dd>
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