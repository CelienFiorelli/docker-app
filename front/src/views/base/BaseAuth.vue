<template>
    <div>
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
            axios.delete('/api/logout').then(() => {
                    store.commit('logout');
                    this.$router.push({ name: 'Login' });
                })
                .catch(err => console.log(err));
        }
    }
}
</script>

<style scoped>
.card {
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
}
</style>