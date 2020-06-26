<template>
    <div>
        <div v-bind:key="contact.id" v-for="contact in contacts">
            <ContactItem
                v-bind:contact="contact"
                v-on:del-contact="$emit('del-contact', contact.id)"
                v-on:edit-contact="$emit('edit-contact', contact)"
            />
        </div>
        <div class="btn-group" role="group" aria-label="Page navigation">
            <button
                type="button"
                class="btn btn-outline-info btn-sm"
                v-bind:class="[{disabled: !pagination.prevPageUrl}]"
                @click="fetchContacts(pagination.prevPageUrl)"
            >Previous</button>
            <button
                type="button"
                class="btn btn-outline-info btn-sm"
            >{{pagination.currentPage}} of {{pagination.lastPage}}</button>
            <button
                type="button"
                class="btn btn-outline-info btn-sm"
                v-bind:class="[{disabled: !pagination.nextPageUrl}]"
                @click="fetchContacts(pagination.nextPageUrl)"
            >Next</button>
        </div>
    </div>
</template>

<script>
import ContactItem from "./ContactItem.vue";
export default {
    name: "Contacts",
    components: {
        ContactItem
    },
    props: {
        contacts: Array
    }
};
</script>

