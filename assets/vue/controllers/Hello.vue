<template>
    <div class="container"> 
        <div class="links-container">
            <a class="link" :href="toLogin">Login</a>
            <a class="link" :href="toRegister">Register</a>
        </div>
    </div>
</template>

<script setup>
defineProps({
    toLogin: String,
    toRegister: String,
    toForgot: String,
});
</script>

<style lang="scss" scoped>

@import "../../styles/app.scss";
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 90px 100px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.links-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.link {
    margin: 0 10px;
    font-size: 18px;
}
</style>
