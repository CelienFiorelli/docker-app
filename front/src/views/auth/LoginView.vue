<template>
    <BaseUnAuth>
        <div class="flex justify-center">
            <div class="w-1/3">
                <div>
                    <div class="text-3xl mb-4">
                        Connexion
                    </div>
                    <div class="flex flex-col" @keypress.enter="login">
                        Email :
                        <input class="bg-zinc-100 border border-black rounded-md w-full my-2" v-model="email" type="email" />
                        {{ errors.email }}
                        Mot de passe :
                        <input class="bg-zinc-100 border border-black rounded-md w-full my-2" v-model="password" type="password" />
                        {{ errors.password }}
                        <div class="mb-2 mt-4 flex justify-center">
                            <button class="bg-zinc-100 border border-zinc-200 rounded-md px-2" @click="login">Se connecter</button>
                        </div>
                    </div>
                </div>
                <div class="w-full text-center text-zinc-500 mt-1">
                    Vous n'avez pas encore de compte ? <a class="text-sky-300 hover:text-sky-400 underline font-semibold" href="/register">inscrivez-vous ici</a>
                </div>
            </div>
        </div>
    </BaseUnAuth>
</template>

<script>
import axios from '@/axios';
import store from '@/store';
import BaseUnAuth from '@/views/base/BaseUnAuth.vue';

export default {
    name: "LoginView",
    components: {
        BaseUnAuth
    },
    data() {
        return {
            email: '',
            password: '',
            errors: {}
        }
    },
    mounted () {
        if (store.state.auth.token) {
            this.$router.push({ name: 'Dashboard' });
        }
    },
    methods: {
        login() {
            axios.post('/api/login', {
                email: this.email,
                password: this.password
            }).then(res => {
                    store.commit('login', res.data.token);
                    store.commit('setUser', res.data.user);
                    this.$router.push({ name: 'Dashboard' });
                })
                .catch(err => {
                    this.errors = err.response.data.errors
                });
        }
    }
}
</script>
