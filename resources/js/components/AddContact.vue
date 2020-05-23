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
        <div v-show="contactData.edit">
          <div class="row">
            <div class="col">
              <div class="form-group" v-bind:class="[{'has-error': contactData.errors.phone}]">
                <input
                  type="tel"
                  class="form-control"
                  v-model="contactData.contact.phone"
                  name="phone"
                  placeholder="Phone"
                  v-bind:class="[{'is-invalid': contactData.errors.phone}]"
                />
                <ErrorMsg v-bind:eachError="contactData.errors.phone" />
              </div>
            </div>
            <div class="col">
              <div class="form-group" v-bind:class="[{'has-error': contactData.errors.birthday}]">
                <input
                  type="date"
                  class="form-control"
                  v-model="contactData.contact.birthday"
                  name="birthday"
                  placeholder="birthday"
                  v-bind:class="[{'is-invalid': contactData.errors.birthday}]"
                />
                <ErrorMsg v-bind:eachError="contactData.errors.birthday" />
              </div>
            </div>
          </div>
          <hr />
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="contactData.contact.address1"
                  name="address1"
                  placeholder="Address 1"
                  v-bind:class="[{'is-invalid': contactData.errors.address1}]"
                />
                <ErrorMsg v-bind:eachError="contactData.errors.address1" />
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="contactData.contact.address2"
                  name="address2"
                  placeholder="Apartment, studio, or floor"
                />
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="contactData.contact.city"
                  name="city"
                  placeholder="City"
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="contactData.contact.state"
                  name="state"
                  placeholder="State"
                />
              </div>
            </div>
            <div class="col">
              <div class="form-group" v-bind:class="[{'has-error': contactData.errors.zip}]">
                <input
                  type="tel"
                  class="form-control"
                  v-model="contactData.contact.zip"
                  name="zip"
                  placeholder="Zip"
                  v-bind:class="[{'is-invalid': contactData.errors.zip}]"
                />
                <ErrorMsg v-bind:eachError="contactData.errors.zip" />
              </div>
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
      let {
        firstname,
        lastname,
        email,
        id,
        phone,
        address1,
        address2,
        city,
        state,
        zip
      } = this.contactData.contact;
      const contact = {
        id,
        firstname,
        lastname,
        email,
        phone,
        address1,
        address2,
        city,
        state,
        zip
      };
      this.$emit("add-contact", contact);
    }
  }
};
</script>

<style>
</style>