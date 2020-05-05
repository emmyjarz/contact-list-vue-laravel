<template>
  <div class="card bg-secondary text-white mb-3">
    <div class="card-body">
      <h3 class="mb-3 font-weight-bold">Contact</h3>
      <form @submit.prevent="addContact">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                v-model="contactData.contact.firstname"
                name="firstname"
                placeholder="First Name"
                v-bind:class="[{'is-invalid': contactData.errors.firstname}]"
              />
              <ErrorMsg v-bind:eachError="contactData.errors.firstname" />
            </div>
          </div>
          <div class="col">
            <div class="form-group" v-bind:class="[{'has-error': contactData.errors.lastname}]">
              <input
                type="text"
                class="form-control"
                v-model="contactData.contact.lastname"
                name="lastname"
                placeholder="Last Name"
                v-bind:class="[{'is-invalid': contactData.errors.lastname}]"
              />
                <ErrorMsg v-bind:eachError="contactData.errors.lastname" />
            </div>
          </div>
          <div class="col">
            <div class="form-group" v-bind:class="[{'has-error': contactData.errors.email}]">
              <input
                type="text"
                class="form-control"
                v-model="contactData.contact.email"
                name="email"
                placeholder="Email"
                v-bind:class="[{'is-invalid': contactData.errors.email}]"
              />
                <ErrorMsg v-bind:eachError="contactData.errors.email" />
            </div>
          </div>
        </div>
        <div class="float-right">
          <button @click="$emit('clear-form')" type="button" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import ErrorMsg from "./ErrorMsg";
export default {
  name: "AddContact",
  components: {
    ErrorMsg
  },
  data() {
    return {
      eachError: {}
    };
  },
  props: ["contactData"],
  methods: {
    addContact(e) {
      e.preventDefault();
      const { firstname, lastname, email, id } = this.contactData.contact;
      const contact = {
        id,
        firstname,
        lastname,
        email
      };
      this.$emit("add-contact", contact);
    }
  }
};
</script>

<style>
</style>