<template>    
    <slot :submit="submit" :fields="fields" :v="v$" :serverErrors="serverErrors" :success="success" />
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
        name: '',
        brand: '',
        plate: '',
        color: ''
      },
      serverErrors: [],
      success: false
    }
  },
  methods: {
    async submit(){
      const isFormCorrect = await this.v$.$validate();
      if(!isFormCorrect) return;
      axios.post('/add-vehicle', this.fields)
      .then(async (response) => {
            Object.keys(this.fields).forEach(e => this.fields[e] = '');
            this.v$.$reset();
            this.serverErrors = [];
            this.success = true;
            await new Promise(r => setTimeout(r, 3000));
            this.success = false;
      })
      .catch(errs => this.serverErrors = errs.response.data.errors);
    }
  },
  validations () {
    return {
      fields: {
        name: { required, maxLength: maxLength(255) },
        brand: { required, maxLength: maxLength(255) },
        password: { required, maxLength: maxLength(255) },
        confirmPassword: { sameAsPassword: helpers.withMessage('Must be equal to the password above', sameAs(this.fields.password)) }, 
      }
    }
  }
}
</script>