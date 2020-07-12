<template>
    <v-container>
        <v-row class="text-center">
            <h1 class="mb-10">Kundenstamm</h1>
        </v-row>
        <v-row class="text-center">
            <v-card
                    v-for="users in this.getUsers.data"
                    :key="users.id"
                    class="mx-auto mb-10"
                    max-width="500"
                    outlined
            >
                <v-list-item
                        three-line
                >
                    <v-list-item-content>
                        <div class="overline mb-4">OVERLINE</div>
                        <v-list-item-title class="headline mb-4">{{ users.firstName }} {{ users.lastName }}</v-list-item-title>

                        <div class="overline mb-2 text-left">Email</div>
                        <div class="overline mb-5 text-left">{{ users.email }}</div>
                        <div class="overline mb-2 text-left">Telefon</div>
                        <div class="overline mb-5 text-left">{{ users.phone }}</div>
                        <div class="overline mb-2 text-left">Info</div>
                        <div class="overline mb-5 text-left">{{ users.info }}</div>
                    </v-list-item-content>

                    <v-list-item-avatar
                            v-if="users.gender === 'male'"
                            tile
                            size="80"
                            color="blue"
                    ></v-list-item-avatar>
                    <v-list-item-avatar
                            v-else
                            tile
                            size="80"
                            color="red"
                    ></v-list-item-avatar>
                </v-list-item>

                <v-card-actions>
                    <v-btn text>Button</v-btn>
                    <v-btn text>Button</v-btn>
                </v-card-actions>
            </v-card>
        </v-row>
    </v-container>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    name: "UserList",
    computed: {
      ...mapGetters({
        getUsers: 'users'
      }),
    }
  }
</script>

<style scoped>

</style>
