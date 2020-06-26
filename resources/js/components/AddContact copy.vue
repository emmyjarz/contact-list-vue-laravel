<template>
    <div class="card bg-secondary text-white mb-3">
        <div class="card-body">
            <h3 class="mb-3 font-weight-bold">Contact</h3>
            <form @submit.prevent="$emit('add-contact', contact)">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="contact.firstname"
                                name="firstname"
                                placeholder="First Name"
                                v-bind:class="{'is-invalid': errors.firstname}"
                            />
                            <ErrorMsg v-bind:eachError="errors.firstname" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="contact.lastname"
                                name="lastname"
                                placeholder="Last Name"
                                v-bind:class="{'is-invalid': errors.lastname}"
                            />
                            <ErrorMsg v-bind:eachError="errors.lastname" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="contact.email"
                                name="email"
                                placeholder="Email"
                                v-bind:class="{'is-invalid': errors.email}"
                            />
                            <ErrorMsg v-bind:eachError="errors.email" />
                        </div>
                    </div>
                </div>
                <div v-show="edit">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input
                                    type="tel"
                                    class="form-control"
                                    v-model="contact.phone"
                                    name="phone"
                                    placeholder="Phone"
                                    v-bind:class="{'is-invalid': errors.phone}"
                                />
                                <ErrorMsg v-bind:eachError="errors.phone" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="contact.birthday"
                                    name="birthday"
                                    placeholder="birthday"
                                    v-bind:class="{'is-invalid': errors.birthday}"
                                />
                                <ErrorMsg v-bind:eachError="errors.birthday" />
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
                                    v-model="contact.address1"
                                    name="address1"
                                    placeholder="Address 1"
                                    v-bind:class="{'is-invalid': errors.address1}"
                                />
                                <ErrorMsg v-bind:eachError="errors.address1" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="contact.address2"
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
                                    v-model="contact.city"
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
                                    v-model="contact.state"
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
                                    v-model="contact.zip"
                                    name="zip"
                                    placeholder="Zip"
                                    v-bind:class="{'is-invalid': errors.zip}"
                                />
                                <ErrorMsg v-bind:eachError="errors.zip" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <button
                        @click="$emit('clear-form')"
                        type="button"
                        class="btn btn-secondary"
                    >Cancel</button>
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
    props: {
        contact: {
            type: Object
        },
        errors: {
            type: Object
        },
        edit: {
            type: Boolean,
            required: true
        }
    },
    data() {
        return {
            eachError: {}
        };
    }
};
</script>

<style>
</style>