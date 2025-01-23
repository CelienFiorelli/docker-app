<template>
    <BaseUnAuth>
        <div class="flex justify-center">
            <div class="w-1/3">
                <div>
                    <div class="text-3xl mb-4">
                        Inscription
                    </div>
                    <div class="flex flex-col" @keypress.enter="login">
                        Nom d'utilisateur :
                        <input class="bg-zinc-100 border border-black rounded-md w-full my-2" v-model="name" />
                        {{ errors.name }}
                        Email :
                        <input class="bg-zinc-100 border border-black rounded-md w-full my-2" type="email" v-model="email" />
                        {{ errors.email }}
                        Mot de passe :
                        <input class="bg-zinc-100 border border-black rounded-md w-full my-2" type="password" v-model="password" />
                        {{ errors.password }}
                        Confirmer le mot de passe :
                        <input class="bg-zinc-100 border border-black rounded-md w-full my-2" type="password" v-model="password_confirmation" />
                        {{ errors.password_confirmation }}
                        <div class="mb-2 mt-4 flex justify-center">
                            <button class="bg-zinc-100 border border-zinc-200 rounded-md px-2" @click="register">S'inscrire</button>
                        </div>
                    </div>
                </div>
                <div class="w-full text-center text-zinc-500 mt-1">
                    Vous avez déjà un compte ? <a class="text-sky-300 hover:text-sky-400 underline font-semibold" href="/login">connectez-vous ici</a>
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
    name: "RegisterView",
    components: {
        BaseUnAuth
    },
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            errors: {}
        }
    },
    mounted () {
        if (store.state.auth.token) {
            this.$router.push({ name: 'Dashboard' });
        }
    },
    methods: {
        register() {
            axios.post('/api/register', {
                email: this.email,
                name: this.name,
                password: this.password,
                password_confirmation: this.password_confirmation
            }).then(res => {
                    store.commit('login', res.data.token);
                    store.commit('setUser', res.data.user);
                    this.$router.push({ name: 'Dashboard' });
                })
                .catch(err => {
                    this.errors = err.response.data.errors ?? {}
                });
        }
    }
}
</script>
