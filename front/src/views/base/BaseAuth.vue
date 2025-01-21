<template>
    <div>
        <div class="h-12 w-full">
            <div class="h-12 px-4 bg-sky-200 border-b border-sky-400 fixed w-full" style="z-index: 90;">
                <div class="flex h-full justify-between">
                    <div></div>
                    <div class="flex items-center justify-center relative">
                        <button class="bg-zinc-100 border border-zinc-200 rounded-md px-2" @click="logout">Déconnexion</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-4">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import axios from '@/axios';
import store from '@/store';

export default {
    name: "BaseAuth",
    data () {
        return {
            user: store.state.auth.user,
            showUserDropdown: false
        }
    },
    methods: {
        logout () {
            axios.post('/api/logout').then(() => {
                    store.commit('logout');
                    this.$router.push({ name: 'Login' });
                }).catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>
.card {
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
}
</style>