<template>
    <div class="card bg-light mb-3">
        <div class="card-body">
            <h3 class="mb-3 font-weight-bold">Contact</h3>
            <form @submit.prevent="updateContact(eachContact)">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="eachContact.firstname"
                                name="firstname"
                                placeholder="First Name"
                                v-bind:class="{'is-invalid': formErrors.firstname}"
                            />
                            <small
                                v-if="formErrors.firstname"
                                class="text-danger"
                            >{{formErrors.firstname[0]}}</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="eachContact.lastname"
                                name="lastname"
                                placeholder="Last Name"
                                v-bind:class="{'is-invalid': formErrors.lastname}"
                            />
                            <small
                                v-if="formErrors.lastname"
                                class="text-danger"
                            >{{formErrors.lastname[0]}}</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="eachContact.email"
                                name="email"
                                placeholder="Email"
                                v-bind:class="{'is-invalid': formErrors.email}"
                            />
                            <small
                                v-if="formErrors.email"
                                class="text-danger"
                            >{{formErrors.email[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="tel"
                                class="form-control"
                                v-model="eachContact.phone"
                                name="phone"
                                placeholder="Phone"
                                v-bind:class="{'is-invalid': formErrors.phone}"
                            />
                            <small
                                v-if="formErrors.phone"
                                class="text-danger"
                            >{{formErrors.phone[0]}}</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="date"
                                class="form-control"
                                v-model="eachContact.birthday"
                                name="birthday"
                                placeholder="birthday"
                            />
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
                                v-model="eachContact.address1"
                                name="address1"
                                placeholder="Address 1"
                                v-bind:class="{'is-invalid': formErrors.address1}"
                            />
                            <small
                                v-if="formErrors.address1"
                                class="text-danger"
                            >{{formErrors.address1[0]}}</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="eachContact.address2"
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
                                v-model="eachContact.city"
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
                                v-model="eachContact.state"
                                name="state"
                                placeholder="State"
                            />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="tel"
                                class="form-control"
                                v-model="eachContact.zip"
                                name="zip"
                                placeholder="Zip"
                                v-bind:class="{'is-invalid': formErrors.zip}"
                            />
                            <small v-if="formErrors.zip" class="text-danger">{{formErrors.zip[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <router-link v-bind:to="'/'">
                        <button @click="clearForm" type="button" class="btn btn-secondary">Cancel</button>
                    </router-link>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    name: "UpdateContact",
    computed: mapGetters(["formErrors", "eachContact"]),
    methods: mapActions(["editContact", "updateContact", "clearForm"]),
    created() {
        this.editContact(this.$route.params.id);
    }
};
</script>

<style>
</style>