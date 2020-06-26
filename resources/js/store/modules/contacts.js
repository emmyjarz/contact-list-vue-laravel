import axios from "axios";

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
                commit("newContact", contact);
                commit("clearForm");
            }
        } catch (err) {
            commit("setSystemErrors", err);
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
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
