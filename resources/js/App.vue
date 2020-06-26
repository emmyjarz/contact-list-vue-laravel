<template>
    <div>
        <AddContact />
        <Contacts />
    </div>
</template>

<script>
import Contacts from "./components/Contacts";
import AddContact from "./components/AddContact";
export default {
    name: "App",
    components: {
        Contacts,
        AddContact
    }
};
</script>

<style scoped>
</style>