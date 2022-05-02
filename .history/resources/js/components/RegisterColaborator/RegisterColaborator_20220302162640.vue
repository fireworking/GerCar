<template>    
    <slot :submit="submit" :fields="fields" :v="v$" :serverErrors="serverErrors" />
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
        confirmPassword: '',
      },
      serverErrors: []
    }
  },
  methods: {
    async submit(){
      const isFormCorrect = await this.v$.$validate();
      if(!isFormCorrect) return;
      axios.post('/register-colaborator', this.fields)
      .then(response => {
          Object.keys(this.fields).forEa
      })
      .catch(errs => this.serverErrors = errs.response.data.errors);
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