<template>
    <div>
        <SystemError />
        <router-view></router-view>
    </div>
</template>

<script>
import SystemError from "./components/SystemError";
export default {
    name: "App",
    components: {
        SystemError
    }
};
</script>

<style scoped>
</style>