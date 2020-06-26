<template>
    <div class="card bg-light mb-3">
        <div class="card-body">
            <h3 class="mb-3 font-weight-bold">Contact</h3>
            <form @submit.prevent="onSubmit">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="eachContact.firstname"
                                name="firstname"
                                placeholder="First Name"
                                v-bind:class="{'is-invalid': errors.firstname}"
                            />
                            <small
                                v-if="errors.firstname"
                                class="text-danger"
                            >{{errors.firstname[0]}}</small>
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
                                v-bind:class="{'is-invalid': errors.lastname}"
                            />
                            <small v-if="errors.lastname" class="text-danger">{{errors.lastname[0]}}</small>
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
                                v-bind:class="{'is-invalid': errors.email}"
                            />
                            <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
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
// import ErrorMsg from "./ErrorMsg";
export default {
    name: "AddContact",
    // data() {
    //     return {
    //         eachContact: {}
    //     };
    // },
    computed: mapGetters(["errors", "eachContact"]),
    methods: {
        ...mapActions(["addContact", "resetForm"]),
        onSubmit() {
            this.addContact(this.eachContact);
        },
        clearForm() {
            this.resetForm();
        }
    }
};
</script>

<style>
</style>