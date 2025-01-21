<template>
    <BaseAuth>
        <div>
            <div className="mt-4 border-sky-400 border-l-4">
                <div className="text-3xl pl-2 border-sky-300 border-l-4">
                Bienvenue <span className="font-semibold text-sky-300">{{ user.name }}</span>
                </div>
            </div>
        </div>
    </BaseAuth>
</template>

<script>
import BaseAuth from '@/views/base/BaseAuth.vue';
import store from '@/store';

export default {
    name: 'DashboardView',
    components: {
        BaseAuth
    },
    data () {
        return {
            user: store.state.auth.user
        }
    }
}
</script>

<style></style>
