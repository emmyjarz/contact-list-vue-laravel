<template>
  <div>
    <AddContact v-bind:contactData="contactData" v-on:add-contact="addContact" />
    <Contacts v-bind:contacts="contacts" v-on:del-contact="deleteContact" />

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
import Contacts from "./components/Contacts";
import AddContact from "./components/AddContact";
export default {
  name: "App",
  components: {
    Contacts,
    AddContact
  },
  data() {
    return {
      contacts: [],
      contactData: {
        contact: {},
        errors: {}
      },
      pagination: {},
      edit: false
    };
  },
  methods: {
    fetchContacts(pageUrl) {
      pageUrl = pageUrl || "/api/contacts";
      fetch(pageUrl)
        .then(res => res.json())
        .then(res => {
          this.contacts = res.data;
          this.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        currentPage: meta.current_page,
        lastPage: meta.last_page,
        nextPageUrl: links.next,
        prevPageUrl: links.prev
      };
      this.pagination = pagination;
    },
    addContact(newContact) {
      if (this.edit === false) {
        console.log("call");
        //Add
        fetch("api/contacts", {
          method: "post",
          body: JSON.stringify(newContact),
          headers: {
            "content-type": "application/json"
          }
        })
          .then(res => res.json())
          .then(res => {
            console.log(res);
            if (res.status !== "success") {
              this.contactData.errors = res.error;
              console.log(res.error.email[0])
            }
          });
      } else {
        //Update
      }
    },
    deleteContact(id) {
      this.$swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        })
        .then(result => {
          if (result.value) {
            fetch(`api/contacts/${id}`, {
              method: "delete"
            })
              .then(res => res.json())
              .then(res => {
                if (res.status !== "success") {
                  this.fetchContacts();
                } else {
                  this.contacts = this.contacts.filter(each => each.id != id);
                }
              })
              .catch(err => console.log(err));
          }
        });
    }
  },
  created() {
    this.fetchContacts();
  }
};
</script>

<style>
</style>