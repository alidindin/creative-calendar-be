<template>
    <v-container>
        <v-row class="text-center">
            <h1>Terminübersicht</h1>
            {{ getEventsByDate }}
            <v-card
                    class="mx-auto"
                    max-width="344"
                    outlined
                    v-for="events in getEventsByDate" :key="events.start"
            >
                <v-list-item three-line>
                    <v-list-item-content>
                        <div v-if="events.gender === 'male'" class="overline mb-4"> Herrenhaarschnitt </div>
                        <div v-else class="overline mb-4"> Damenhaarschnitt </div>
                        <v-list-item-title class="headline mb-1">{{ events.title }}</v-list-item-title>
                        <v-list-item-subtitle>Info: {{ events.content }}</v-list-item-subtitle>
                        <v-list-item-subtitle>Notiz: {{ events.contentFull }}</v-list-item-subtitle>
                        <v-list-item-subtitle>{{ events.start }} - {{ events.endHour }}:{{ events.endMinutes }}</v-list-item-subtitle>
                    </v-list-item-content>

                    <v-list-item-avatar
                            v-if="events.gender === 'male'"
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
    name: "EventsList",
    computed: {
      ...mapGetters({
        getEvents: 'events'
      }),
      getEventsByDate () {
        if(!this.getEvents.data) return [];
        return this.getEvents.data.map((item) => {
          return {
                id: item.id,
                start: item.start,
                end: item.end,
                startYear: new Date(item.start).getFullYear(),
                startMonth: new Date(item.start).getMonth() + 1,
                startHour: new Date(item.start).getHours(),
                startMinutes: new Date(item.start).getMinutes(),
                endHour: new Date(item.end).getHours(),
                endMinutes: new Date(item.end).getMinutes(),
                title: item.title,
                content: item.content,
                contentFull: item.contentFull,
                gender: item.gender,
                email: item.email
          }
        })
      }
    }
  }
</script>

<style scoped>

</style>
