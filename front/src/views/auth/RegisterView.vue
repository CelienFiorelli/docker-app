<template>
    <BaseUnAuth>
        <div class="flex justify-center">
            <div class="w-1/3">
                <div>
                    Inscription
                    <div class="flex flex-col items-center" @keypress.enter="login">
                        <input label="Nom d'utilisateur :" v-model="username" />
                        {{ errors.username }}
                        <input label="Email :" type="email" v-model="email" />
                        {{ errors.email }}
                        <input label="Mot de passe :" type="password" v-model="password" />
                        {{ errors.password }}
                        <input label="Confirmer le mot de passe :" type="password" v-model="password_confirmation" />
                        {{ errors.password_confirmation }}
                        <div class="mb-2 mt-4">
                            <button @click="register">S'inscrire</button>
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
            username: '',
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
                username: this.username,
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
