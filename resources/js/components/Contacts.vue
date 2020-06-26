<template>
    <div>
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
                            <button class="btn btn-success btn-sm">EDIT</button>
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
                            <button class="btn btn-danger btn-sm">DELETE</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
        ...mapActions(["fetchContacts"])
    },
    computed: mapGetters(["allContacts", "pagination"]),
    created() {
        this.fetchContacts();
    }
};
</script>

