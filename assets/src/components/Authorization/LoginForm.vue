<template>
    <v-form v-model="valid">
        <v-container>
            <v-row>
                <v-col
                        cols="12"
                        md="4"
                >
                    <v-text-field
                            v-model="user.email"
                            :rules="emailRules"
                            label="E-mail"
                            required
                    ></v-text-field>
                </v-col>

                <v-col
                        cols="12"
                        md="4"
                >
                    <v-text-field
                            v-model="user.password"
                            :rules="nameRules"
                            :counter="3"
                            label="Password"
                            required
                    ></v-text-field>
                </v-col>

                <v-col
                        cols="12"
                        md="4"
                >
                </v-col>
            </v-row>
            <v-row>
                <v-btn
                        :disabled="!valid"
                        color="success"
                        class="mr-4"
                        @click="validate"
                >
                    Validate
                </v-btn>

                <v-btn
                        color="error"
                        class="mr-4"
                        @click="reset"
                >
                    Reset Form
                </v-btn>

                <v-btn
                        color="warning"
                        @click="resetValidation"
                >
                    Reset Validation
                </v-btn>
            </v-row>
        </v-container>
    </v-form>
</template>

<script>
  export default {
    data() {
      return {
        user: {
          email: '',
          password: '',
        },
        valid: false,
        nameRules: [
          v => !!v || 'Name is required',
          v => v.length <= 10 || 'Name must be less than 10 characters',
        ],
        emailRules: [
          v => !!v || 'E-mail is required',
          v => /.+@.+/.test(v) || 'E-mail must be valid',
        ],
      }
    },
    methods: {
      validate () {
        this.$refs.form.validate()
      },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
      handleSubmit() {
        this.$store.dispatch('getAuthorization', this.$store.getters['getAuth'];
      },
    },
  }
</script>

<style scoped lang="scss">
</style>
