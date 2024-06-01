<template>
    <div class="container">
        <h1 class="title">Hello, {{ name }}</h1>

        <v-btn>
            Button
        </v-btn>
    </div>
</template>

<script setup>
defineProps({
    name: String
});
</script>

<style lang="scss" scoped>
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 90px 100px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.title {
    font-size: 24px;
    color: #333;

    &:hover {
        color: #f00;
    }
}
</style>
