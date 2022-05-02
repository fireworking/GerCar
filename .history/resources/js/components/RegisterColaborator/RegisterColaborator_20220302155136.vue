<template>    
    <slot :submit="submit" :fields="fields" :v="v$" :serverErrors="serverErrors" />
</template>

<script>
import useVuelidate from '@vuelidate/core'
import { required, maxLength, email, sameAs } from '@vuelidate/validators'

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
        confirmPassword: '',
      },
      serverErrors: []
    }
  },
  methods: {
    async submit(){
      const isFormCorrect = await this.v$.$validate();
      if(!isFormCorrect) return;
      axios.post('/login-company', this.fields)
      .then(response => window.location.href = '/company-profile/mine')
      .catch(errs => this.serverErrors = errs.response.data);
    }
  },
  validations () {
    return {
      fields: {
        email: { required, email, maxLength: maxLength(255) }, 
        password: { required, maxLength: maxLength(255) },
        confirmPassword: { sameAsPassword: helpers.withMessage('Must be equal to the password above', sameAs(this.fields.password)) }, 
      }
    }
  }
}
</script>