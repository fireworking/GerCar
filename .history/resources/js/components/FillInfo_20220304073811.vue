<template>    
    <slot :submit="submit" :fields="fields" :v="v$" :serverErrors="serverErrors" />
</template>

<script>
import useVuelidate from '@vuelidate/core'
import { required, maxLength, email } from '@vuelidate/validators'

const axios = require('axios').default;
const cpf = (value) => value.length == 14;
const cpf = (value) => value.length == 10;
export default {
  setup () {
    return { v$: useVuelidate({$lazy: true, $autoDirty: true})}
  },
  data() {
    return {
      fields: {
        name: '',
        cpf: '',
        birthDate: '',
        phoneNumber: ''
      },
      serverErrors: []
    }
  },
  methods: {
    async submit(){
      const isFormCorrect = await this.v$.$validate();
      if(!isFormCorrect) return;
      axios.post('/fill-info', this.fields)
      .then(response => window.location.href = '/profile')
      .catch(errs => this.serverErrors = errs.response.data);
    }
  },
  validations () {
    return {
      fields: {
        name: { required, maxLength: maxLength(255) }, 
        cpf: { required, cpf: helpers.withMessage('Must be 11 digits long', cpf) },
        birthDate: { required, date: helpers.withMessage('Must be 11 digits long', date) },
      }
    }
  }
}
</script>