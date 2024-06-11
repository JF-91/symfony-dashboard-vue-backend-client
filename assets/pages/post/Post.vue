<script setup>
import { ref, onMounted } from 'vue'
import ApiService from "../../service/ApiService";

const posts = ref([]);

onMounted( async() => {
    ApiService.getAll('/posts')
        .then(response => {
            console.log(response.data);
            response.data.forEach(({ title, description }) => {
                posts.value.push({ title, description });
            });
        })
        .catch(error => {
            console.log(error);
        });
})
</script>

<template>
    <v-container>
        <v-row>
            <v-col cols="12">
                <v-card>
                    <v-card-title>Posts</v-card-title>
                    <v-card-text>
                        <v-list>
                            <v-list-item-group>
                                <v-list-item v-for="(post, index) in posts" :key="index">
                                    <v-list-item-content>
                                        <v-list-item-title>{{ post.title }}</v-list-item-title>
                                        <v-list-item-subtitle>{{ post.description }}</v-list-item-subtitle>
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list-item-group>
                        </v-list>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<style lang="scss" scoped>
</style>