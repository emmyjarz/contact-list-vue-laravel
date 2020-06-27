<template>
    <div class="card bg-light mb-3">
        <div class="card-body">
            <h3 class="mb-3 font-weight-bold">Contact</h3>
            <form @submit.prevent="addContact(eachContact)">
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

                <div class="float-right">
                    <button @click="clearForm" type="button" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    name: "AddContact",
    computed: mapGetters(["formErrors", "eachContact"]),
    methods: mapActions(["addContact", "clearForm"])
};
</script>

<style>
</style>