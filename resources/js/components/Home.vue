<template>
    <div>
        <AddContact />
        <Contacts />
    </div>
</template>

<script>
import AddContact from "./AddContact";
import Contacts from "./Contacts";
export default {
    name: "Home",
    components: {
        Contacts,
        AddContact
    }
};
</script>

<style>
</style>