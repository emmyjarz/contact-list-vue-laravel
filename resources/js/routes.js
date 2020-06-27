import UpdateContact from "./components/UpdateContact.vue";
import Home from "./components/Home.vue";

export default [
    {
        path: "/",
        component: Home
    },
    {
        path: "/contacts/:id",
        component: UpdateContact
    }
];
