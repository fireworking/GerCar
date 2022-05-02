<template>    
    <slot :states="states" :cities="cities" :defineCities="defineCities" :submit="submit" 
      :fields="fields" :v="v$" :serverErrors="serverErrors" />
</template>

<script>
import useVuelidate from '@vuelidate/core'
import { required, maxLength, email, sameAs, helpers } from '@vuelidate/validators'

const axios = require('axios').default;
export default {
  setup () {
    return { v$: useVuelidate({$lazy: true, $autoDirty: true})}
  },
  data() {
    return {
      fields: {
        email: '', 
        password: '',
      },
      serverErrors: []
    }
  },
  methods: {
    async submit(){
      const isFormCorrect = await this.v$.$validate();
      if(!isFormCorrect) return;
      axios.post('/register-company', this.fields)
      .then(response => window.location.href = '/company-profile/mine')
      .catch(errs => this.serverErrors = errs.response.data.errors);
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
        confirmPassword: { sameAsPassword: helpers.withMessage('Must be equal to the password above', sameAs(this.fields.password)) }, 
        termsOfService: { required, sameAsRawValue: sameAs(true) },
      }
    }
  }
}
</script>