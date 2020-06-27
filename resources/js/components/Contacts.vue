<template>
    <div>
        <table class="table table-hover">
            <thead>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birthday</th>
                <th></th>
            </thead>
            <tbody>
                <tr v-bind:key="contact.id" v-for="contact in allContacts">
                    <td>
                        <router-link v-bind:to="'contacts/' + contact.id">
                            <button class="btn btn-success btn-sm">EDIT</button>
                        </router-link>
                    </td>
                    <td>{{contact.firstname}} {{contact.lastname}}</td>
                    <td>{{contact.email}}</td>
                    <td>
                        <span
                            v-if="contact.phone"
                        >({{contact.phone.slice(0,3)}}) {{contact.phone.slice(3, 6)}}-{{contact.phone.slice(6,10)}}</span>
                        <span v-else>N/A</span>
                    </td>
                    <td>
                        <span v-if="contact.birthday">{{contact.birthday}}</span>
                        <span v-else>N/A</span>
                    </td>
                    <td>
                        <button
                            @click="removeContact(contact.id)"
                            class="btn btn-danger btn-sm"
                        >DELETE</button>
                    </td>
                </tr>
            </tbody>
        </table>
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
import { mapGetters, mapActions } from "vuex";

export default {
    name: "Contacts",
    methods: {
        ...mapActions(["fetchContacts", "deleteContact"]),
        removeContact(contactId) {
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
                        this.deleteContact(contactId);
                    }
                });
        }
    },
    computed: mapGetters(["allContacts", "pagination", "systemErrors"]),
    // watch: {
    //     systemErrors(newValue, oldValue) {
    //         if (newValue !== oldValue) {
    //             this.$swal.fire({
    //                 position: "top-end",
    //                 icon: "error",
    //                 width: "300px",
    //                 title: this.systemErrors,
    //                 showConfirmButton: true
    //             });
    //         }
    //     }
    // },
    created() {
        this.fetchContacts();
    }
};
</script>

