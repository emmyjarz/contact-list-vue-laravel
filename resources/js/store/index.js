import Vuex from "vuex";
import Vue from "vue";
import contacts from "./modules/contacts";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        contacts
    }
});
