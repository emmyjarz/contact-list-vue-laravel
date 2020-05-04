<template>
  <div class="card bg-light mb-3">
    <div class="card-body">
      <h3 class="text-primary mb-3 font-weight-bold">Contact</h3>
      <form @submit.prevent="addContact">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                v-model="firstname"
                name="firstname"
                placeholder="First Name"
                v-bind:class="[{'is-invalid': contactData.errors.firstname}]"
              />
              <small v-if="contactData.errors.firstname" class="text-danger">{{contactData.errors.firstname[0]}}</small>
            </div>
          </div>
          <div class="col">
            <div class="form-group" v-bind:class="[{'has-error': contactData.errors.lastname}]">
              <input
                type="text"
                class="form-control"
                v-model="lastname"
                name="lastname"
                placeholder="Last Name"
                v-bind:class="[{'is-invalid': contactData.errors.lastname}]"
              />
              <small v-if="contactData.errors.lastname" class="text-danger">{{contactData.errors.lastname[0]}}</small>
            </div>
          </div>
          <div class="col">
            <div class="form-group" v-bind:class="[{'has-error': contactData.errors.email}]">
              <input
                type="text"
                class="form-control"
                v-model="email"
                name="email"
                placeholder="Email"
                v-bind:class="[{'is-invalid': contactData.errors.email}]"
              />
              <small v-if="contactData.errors.email" class="text-danger">{{contactData.errors.email[0]}}</small>
            </div>
          </div>
        </div>
        <div class="float-right">
          <button @click="clearForm()" type="button" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "AddContact",
  props: ["contactData"],
  data() {
    return {
      firstname: "",
      lastname: "",
      email: "",
      errors: {}
      // contactData:{}
    };
  },
  methods: {
    addContact(e) {
      e.preventDefault();
      const newContact = {
        firstname: this.firstname,
        lastname: this.lastname,
        email: this.email
      };
      this.$emit("add-contact", newContact);
    }
  },
  created() {
    //   this.contactData = contactData;
    //   console.log('hello', this.contactData);
  }
};
</script>

<style>
</style>