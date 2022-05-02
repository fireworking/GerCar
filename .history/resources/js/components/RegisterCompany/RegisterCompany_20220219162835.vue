<template>    
    <slot :states="states" :cities="cities" :defineCities="defineCities" :submit="submit" :fields="fields" :v="v$"  />
</template>

<script>
import json_cities from '../../app.js'
import useVuelidate from '@vuelidate/core'
import { required, maxLength, email, sameAs, helpers } from '@vuelidate/validators'

const axios = require('axios').default;
const cnpj = (value) => value.length == 14 || value.length == 18;
export default {
  setup () {
    return { v$: useVuelidate({$lazy: true, $autoDirty: true})}
  },
  data() {
    return {
      states: json_cities.states,
      cities: [],
      fields: {
        name: '', 
        state: '', 
        cnpj: '',
        city: '', 
        email: '', 
        password: '',
        confirmPassword: '',
        termsOfService: ''
      },
    }
  },
  methods: {
    defineCities(state){
      let stateId = this.states.find(e => e.uf == state).id;
      this.cities = json_cities.cities.filter(e => e.state_id == stateId);
    },
    async submit(){
      const isFormCorrect = await this.v$.$validate();
      if(!isFormCorrect) return;
      await axios.post('/register-company', this.fields);
      window.location.href = '/company-profile/mine';
    }
  },
  validations () {
    return {
      fields: {
        name: { required, maxLength: maxLength(255) }, 
        state: { required }, 
        cnpj: { required, cnpj: helpers.withMessage('Must be 11 or 14 digits long', cnpj) },
        city: { required, maxLength: maxLength(255) }, 
        email: { required, email, maxLength: maxLength(255) }, 
        password: { required, maxLength: maxLength(255) }, 
        confirmPassword: { sameAsPassword: helpers.withMessage('Must be equal to the other value', sameAs(this.fields.password)) }, 
        termsOfService: { required, sameAsRawValue: sameAs(true) },
      }
    }
  }
}
</script>