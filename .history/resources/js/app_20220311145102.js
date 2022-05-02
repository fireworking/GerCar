require('./bootstrap');

import json_cities from './estados-cidades.js';

export default json_cities;

import * as Vue from 'vue';

import VueTheMask from 'vue-the-mask'

const app = Vue.createApp({});

app.use(VueTheMask);

app.component('home', require('./components/Home/Home.vue').default);
app.component('gray-box', require('./components/Home/GrayBox.vue').default);
app.component('back-image', require('./components/Home/BackImage.vue').default);
app.component('contact-box', require('./components/Home/ContactBox.vue').default);

app.component('register-company', require('./components/RegisterCompany/RegisterCompany.vue').default);
app.component('login', require('./components/Login/Login.vue').default);

app.component('register-colaborator', require('./components/RegisterColaborator/RegisterColaborator.vue').default);
app.component('fill-info', require('./components/RegisterColaborator/FillInfo.vue').default);

app.component('fill-info', require('./components/Add/FillInfo.vue').default);

app.component('text-input', require('./components/Input/TextInput.vue').default);
app.component('styled-label', require('./components/Input/StyledLabel.vue').default);

app.component('error', require('./components/Error.vue').default);
app.component('flash', require('./components/Flash.vue').default);
app.component('default-form', require('./components/DefaultForm.vue').default);

app.mount('#app');
