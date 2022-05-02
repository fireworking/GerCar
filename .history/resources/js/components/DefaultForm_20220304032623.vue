<template>
    <slot name="flash" v-if="success"></slot>
    <div class="min-h-full flex flex-col justify-center py-16 sm:px-16 lg:px-20">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img v-if="logoValue" src="img/car.png" class="w-20 m-auto p-1 border rounded-full border-orange-500">      
        <h2 class="mt-1 sm:mt-3 text-center text-3xl font-extrabold text-gray-900">
          <slot name="title"></slot>
        </h2>
        <p class="mt-1 sm:mt-2 text-center text-sm text-gray-600">
          <slot name="text_subtitle"></slot>
          <a :href="hrefSubtitle ?? '#'" class="ml-1 font-medium text-orange-600 hover:text-orange-500">
              <slot name="link_subtitle"></slot>
          </a>
        </p>
      </div>
      <div class="sm:mt-2 sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="bg-white py-2 sm:pb-4 sm:pt-1 px-4 shadow sm:rounded-lg sm:px-10">
          <form class="space-y-6" v-on:submit.prevent="submit" :action="currentUri" method="POST">
            <slot name="csrf"></slot>
            <div class="grid gap-y-6 gap-x-4 sm:grid-cols-6">

              <div v-if="data.includes('name')" class="sm:col-span-5">
                <text-input :fields="fields" field="name">Name</text-input>
                <error :field="v.fields.name" :server-error="serverErrors.name"></error>
                <error :field="v.fields.state"></error>
              </div>

              <div v-if="data.includes('state')" class="sm:col-span-1">
                <styled-label field='state'>State</styled-label>
                <select v-model="fields.state" id="state" v-on:change="defineCities($event.target.value)" name="state" autocomplete="state-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                  <option value="" selected hidden>##</option>
                  <option v-for="{id, uf} in states" :key="id" :value="uf">{{ uf }}</option>
                </select>
              </div>

              <div v-if="data.includes('cnpj')" class="sm:col-span-3">
                <text-input :fields="fields" field="cnpj" :vm="['##.###.###/####-##']">CNPJ</text-input>
                <error :field="v.fields.cnpj" :server-error="serverErrors.cnpj"></error>
              </div>

              <div v-if="data.includes('cpf')" class="sm:col-span-3">
                <text-input :fields="fields" field="cpf" :vm="['###.###.###-##']">CPF</text-input>
                <error :field="v.fields.cpf" :server-error="serverErrors.cpf"></error>
              </div>

              <div v-if="data.includes('birth')" class="sm:col-span-3">
                <text-input :fields="fields" field="phone-number" :vm="['(##) ####-####', '(##) #####-####']">Phone Number</text-input>
                <error :field="v.fields.phoneNumber" :server-error="serverErrors.phoneNumber"></error>
              </div>

              <div v-if="data.includes('phone-number')" class="sm:col-span-3">
                <text-input :fields="fields" field="phone-number" :vm="['(##) ####-####', '(##) #####-####']">Phone Number</text-input>
                <error :field="v.fields.phoneNumber" :server-error="serverErrors.phoneNumber"></error>
              </div>
        
              <div v-if="data.includes('city')" class="sm:col-span-3">
                <styled-label field='city'>City</styled-label>
                <select v-model="fields.city" id="city" name="city" autocomplete="city-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                  <option value="" selected hidden v-if="!cities?.length">--Choose a state--</option>
                  <option v-for="({name}, index) in cities" :key="index" :value="name">{{ name }}</option>
                </select>
                <error :field="v.fields.city"></error>
              </div>  

            </div>
        
            <div v-if="data.includes('email')">
              <text-input :fields="fields" field="email">Email Address</text-input>
              <error :field="v.fields.email" :server-error="serverErrors.email"></error>
            </div>
        
            <div v-if="data.includes('password')">
              <text-input :fields="fields" field="password">Password</text-input>
              <error :field="v.fields.password"></error>
            </div>

            <div v-if="data.includes('confirm-password')">
              <text-input :fields="fields" field="confirm-password">Confirm Password</text-input>
              <error :field="v.fields.confirmPassword"></error>
            </div>
            <div v-if="data.includes('terms-of-service')">
              <div class="flex items-center justify-between h-2">
                <div class="flex items-center">
                  <input v-model="fields.termsOfService" id="terms-of-service" name="terms-of-service" type="checkbox" class="w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                  <label for="terms-of-service" class="ml-2 block text-sm text-gray-900">
                    By checking this box, you are agreeing to our terms of service.
                  </label>
                </div>
              </div>
              <span v-if="v.fields.termsOfService.$error" class="text-red-500 text-sm">You must check the box to continue.</span>   
            </div>   
            <div>
              <button id="register" type="submit" class="w-full mb-4 mt-8 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                Register
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    props: ['states', 'cities', 'defineCities', 'submit', 'fields', 'v', 'serverErrors', 'hrefSubtitle', 'data', 'success', 'logo'],
    data() {
      return {
        currentUri: window.location.href.replace('http://localhost', ''),
        logoValue: this.logo == null ? true : this.logo
      }
    },
}
</script>