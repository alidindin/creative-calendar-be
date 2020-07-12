<template>
    <v-form
            ref="form"
            v-model="valid"
            :lazy-validation="lazy"
    >
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
                        @click="handleSubmit"
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
            <v-row>
                {{ this.authorization }}
                {{ this.getAuthData }}
            </v-row>
        </v-container>
    </v-form>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    data() {
      return {
        user: {
          email: '',
          password: '',
        },
        valid: false,
        lazy: false,
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
    computed: {
      ...mapGetters({
        authorization: 'authorization'
      })
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
        console.log('handleSubmit', this.user);
        this.$store.dispatch('getAuthorization', this.user);
      }
    },
  }
</script>

<style scoped lang="scss">
</style>
