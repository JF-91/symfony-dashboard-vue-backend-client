<script setup>
import EmployeeNavbarApp from "../common/EmployeeNavbarApp.vue"
import SidebarApp from '../common/SidebarApp.vue'

</script>

<template>
    <v-app>
        <EmployeeNavbarApp />
        <SidebarApp />
        <v-main>
            <v-container>
                <v-row>
                    <v-col>
                        <router-view></router-view>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<style lang="scss" scoped>
</style>