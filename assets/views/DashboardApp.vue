<script setup>
import NavbarApp from '../common/NavbarApp.vue'
import SidebarApp from '../common/SidebarApp.vue'

</script>

<template>
    <v-app>
        <NavbarApp />
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