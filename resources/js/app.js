require("./bootstrap");
import "bootstrap/dist/css/bootstrap.css";
import VueSweetalert2 from "vue-sweetalert2";
import store from "./store";
import VueRouter from "vue-router";
import routes from "./routes";

window.Vue = require("vue");

// VueSweetalert2
Vue.use(VueSweetalert2);
Vue.use(VueRouter);
Vue.component("app", require("./App.vue").default);

export const router = new VueRouter({
    routes,
    mode: "history"
});

new Vue({
    el: "#app",
    store,
    router
});
