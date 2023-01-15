import { createRouter, createWebHistory } from "vue-router";


import Home from "../pages/Home.vue";
import Shop from "../pages/Shop.vue";
import Dashboard from "../pages/Dashboard.vue";
import Login from "../pages/Login.vue";
import Register from "../pages/Register.vue";



const routes = [
    {
        path: "/home",
        name: "Home",
        component: Home,
         meta: { requiresAuth: true }
    },
    {
        path: "/shop",
        name: "Shop",
        component: Shop,
             meta: { requiresAuth: true }
    },
    {
        path: "/",
        name: "Login",
        component: Login,
        meta: { requiresGuest: true }
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
        meta: { requiresGuest: true }
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
         meta: { requiresAuth: true }
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from) => {
    const authenticated = localStorage.getItem("authenticated");

    if (to.meta.requiresGuest && authenticated) {
        return {
            name: "Dashboard",
        };
    } else if (to.meta.requiresAuth && !authenticated) {
        return {
            name: "Login",
        };
    }
});

export default router;