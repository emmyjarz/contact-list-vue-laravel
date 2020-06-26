import axios from "axios";

const state = {
    contacts: [],
    pagination: {},
    eachContact: {},
    errors: {}
};

const getters = {
    allContacts: state => state.contacts,
    pagination: state => state.pagination,
    eachContact: state => state.eachContact,
    errors: state => state.errors
};

const actions = {
    async fetchContacts({ commit }, pageUrl) {
        pageUrl = pageUrl || "api/contacts";
        const response = await axios.get(pageUrl);
        commit("setContacts", response.data);
    },
    async addContact({ commit }, contact) {
        const response = await axios.post("api/contacts", contact);
        if (response.data.status !== "success") {
            commit("setErrors", response.data.error);
        } else {
            commit("newContact", contact);
            commit("clearForm");
        }
    },
    resetForm({ commit }) {
        commit("clearForm");
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
    setErrors: (state, errors) => {
        state.errors = errors;
    },
    newContact: (state, contact) => {
        state.contacts.unshift(contact);
    },
    clearForm: state => {
        state.eachContact = {};
        state.errors = {};
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
