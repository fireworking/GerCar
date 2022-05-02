<template>
    <div class="relative bg-gray-50 overflow-hidden h-4/6">
        <div :class="'relative ' + 
            (windowWidth < 641 && windowWidth > 345 ? 'pt-16' : 'pt-10 sm:pt-20')">
            <img src="img/car.png" class="w-20 m-auto">
            <main class="mx-auto max-w-7xl px-4">
                <div class="text-center">
                    <h1 class="text-4xl tracking-tight font-extrabold text-orange-600 sm:text-5xl md:text-6xl">
                    <span class="xl:inline">Cn</span>
                    <span class="text-gray-900 xl:inline">Cle</span>
                    </h1>
                    <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-2xl">
                    Manage the automobiles of your company's colaborators in the most efficient and safe way. For free!
                    </p>
                    <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                        <div class="rounded-md shadow">
                            <a href="/register-company" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 md:py-4 md:text-lg md:px-10">
                            Register Company
                            </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="/login-company" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-orange-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                            Login
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    name: 'GrayBox',
    props: ['windowWidth']
}
</script>