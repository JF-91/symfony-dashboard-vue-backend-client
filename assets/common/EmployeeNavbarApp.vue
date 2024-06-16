<script setup>
import { ref } from 'vue'
import { useTheme } from "vuetify";


const theme = useTheme();
const myThemes = ["light", "dark"];
const selectedTheme = ref(myThemes[0]);

const setTheme = () => {
    theme.global.name.value = selectedTheme.value;
    console.log(selectedTheme.value);
};
</script>

<template>

    <v-app-bar color="primary" fixed app>
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title>Firma - Dashboard</v-toolbar-title>

        <v-spacer></v-spacer>

        <div class="container-links">
            <router-link :to="{name: 'home'}">
                <v-btn color="secondary" variant="flat">Employee Home</v-btn>
            </router-link>

            <router-link :to="{name: 'posts'}">
                <v-btn color="secondary" variant="flat">Employee Posts</v-btn>
            </router-link>

            <!-- <router-link to="/contact">
                <v-btn color="secondary" variant="flat">Contact</v-btn>
            </router-link> -->

        </div>

        <v-select label="Select Theme" v-model="selectedTheme" :items="myThemes" @update:modelValue="setTheme()">
        </v-select>
    </v-app-bar>


</template>

<style lang="scss" scoped>
.container-links {
    display: flex;
    width: 20%;
    margin: 0 2rem;
    justify-content: space-between;
    align-items: center;

    @media (max-width: 600px) {
        width: 50%;
    }
}
</style>