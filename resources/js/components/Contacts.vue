<template>
  <div>
    <div v-bind:key="contact.id" v-for="contact in contacts">
      <ContactItem
        v-bind:contact="contact"
        v-on:del-contact="$emit('del-contact', contact.id)"
        v-on:edit-contact="$emit('edit-contact', contact)"
      />
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

