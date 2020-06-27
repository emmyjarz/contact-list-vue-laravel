import axios from "axios";
import { router } from "../../app.js";
const baseURL = process.env.MIX_APP_URL;

const state = {
    contacts: [],
    pagination: {},
    eachContact: {},
    formErrors: {},
    systemErrors: ""
};

const getters = {
    allContacts: state => state.contacts,
    pagination: state => state.pagination,
    eachContact: state => state.eachContact,
    formErrors: state => state.formErrors,
    systemErrors: state => state.systemErrors
};

const actions = {
    async fetchContacts({ commit }, pageUrl) {
        try {
            pageUrl = pageUrl || "api/contacts";
            const response = await axios.get(pageUrl);
            commit("setContacts", response.data);
        } catch (err) {
            commit("setSystemErrors", err);
        }
    },
    async addContact({ commit }, contact) {
        try {
            const response = await axios.post("api/contacts", contact);
            if (response.data.status !== "success") {
                commit("setFormErrors", response.data.error);
            } else {
                commit("newContact", response.data.data);
                commit("setClearForm");
            }
        } catch (err) {
            commit("setSystemErrors", err);
        }
    },
    async editContact({ commit }, contactId) {
        try {
            const index = state.contacts.findIndex(
                contact => contact.id == contactId
            );
            if (index !== -1) {
                commit("setEditContact", state.contacts[index]);
            } else {
                commit("setSystemErrors", "Cannot find Contact!");
            }
        } catch (err) {
            commit("setSystemErrors", err.message);
        }
    },
    async updateContact({ commit }, contact) {
        try {
            const response = await axios.put(
                `${baseURL}/api/contacts/${contact.id}`,
                contact
            );
            if (response.data.status !== "success") {
                commit("setFormErrors", response.data.error);
            } else {
                commit("setUpdateContact", contact);
                commit("setClearForm");
            }
        } catch (err) {
            commit("setSystemErrors", err.message);
        }
    },
    async deleteContact({ commit }, contactId) {
        try {
            const response = await axios.delete(`api/contacts/${contactId}`);
            if (response.data.status !== "success") {
                commit("setSystemErrors", response.data.error);
            } else {
                commit("setDeleteContact", contactId);
            }
        } catch (err) {
            commit("setSystemErrors", err.message);
        }
    },
    clearForm({ commit }) {
        commit("setClearForm");
    },
    clearSystemError({ commit }) {
        commit("setClearSystemError");
    }
};
const mutations = {
    setContacts: (state, contacts) => {
        let pages = {
            currentPage: contacts.meta.current_page,
            lastPage: contacts.meta.last_page,
            nextPageUrl: contacts.links.next,
            prevPageUrl: contacts.links.prev
        };
        state.pagination = pages;
        state.contacts = contacts.data;
    },
    newContact: (state, contact) => state.contacts.unshift(contact),
    setEditContact: (state, contact) => (state.eachContact = contact),
    setUpdateContact: (state, contact) => {
        const index = state.contacts.findIndex(
            eachContact => eachContact.id === contact.id
        );
        if (index !== -1) {
            state.contacts.slice(index, 1, contact);
            router.push("/");
        }
    },
    setDeleteContact: (state, contactId) => {
        state.contacts = state.contacts.filter(
            contact => contactId !== contact.id
        );
    },
    setFormErrors: (state, errors) => (state.formErrors = errors),
    setSystemErrors: (state, errors) => (state.systemErrors = errors),
    setClearForm: state => {
        state.eachContact = {};
        state.formErrors = {};
    },
    setClearSystemError: state => (state.systemErrors = "")
};

export default {
    state,
    getters,
    actions,
    mutations
};
