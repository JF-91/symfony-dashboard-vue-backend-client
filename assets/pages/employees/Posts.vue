<script setup>
import { ref, onMounted } from 'vue'
import ApiService from "../../service/ApiService";

const posts = ref([]);

onMounted( async() => {
    ApiService.getAll('/posts')
        .then(response => {
            posts.value = response.data['hydra:member'];
            console.log(response);
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

                                    <v-separator></v-separator>
                                    
                                    <v-img :src="post.link" width="100" height="100"></v-img>
                                </v-list-item>
                                <v-divider></v-divider>
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