import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '@/views/auth/LoginView.vue';
import RegisterView from '@/views/auth/RegisterView.vue';
import DashboardView from '@/views/DashboardView.vue';
import store from '@/store';

const routes = [
    {
        path: '/',
        name: 'Dashboard',
        component: DashboardView,
        meta: {middleware: ["auth"]}
    },
    {
        path: '/login',
        name: 'Login',
        component: LoginView,
    },
    {
        path: '/register',
        name: 'Register',
        component: RegisterView,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const token = store.state.auth.token;
    if (to.meta.middleware && to.meta.middleware.includes("auth") && !token) {
        return next({ name: 'Login'});
    }
    return next();
});

export default router;