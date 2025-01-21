<template>
    <BaseAuth>
        <div>
            <div className="mb-16 mt-4 text-3xl">
                Bienvenue <span className="font-semibold text-sky-300">{{ user.name }}</span>
            </div>
            <div class="flex justify-center flex-wrap gap-2">
                <div v-for="image in images" :key="image.id" class="border-2 border-t-8 border-zinc-800 bg-zinc-100 rounded-md p-2" :class="{'border-green-600': image.isLike, 'border-red-600': image.isDislike }">
                    <img width="150" :src="image.path" :alt="image.name">
                    <div class="flex justify-around">
                        <div>
                            {{ image.likeCount }} Like
                        </div>
                        <div>
                            {{ image.dislikeCount }} Dislike
                        </div>
                    </div>
                    <div class="flex justify-around gap-4">
                        <button class="border border-green-400 bg-green-300 px-2 rounded-md" @click="like(image.id, true)">Like</button>
                        <button class="border border-rose-400 bg-rose-300 px-2 rounded-md" @click="like(image.id, false)">Dislike</button>
                    </div>
                </div>
            </div>
        </div>
    </BaseAuth>
</template>

<script>
import BaseAuth from '@/views/base/BaseAuth.vue';
import store from '@/store';
import axios from '@/axios';

export default {
    name: 'DashboardView',
    components: {
        BaseAuth
    },
    data () {
        return {
            user: store.state.auth.user,
            images: []
        }
    },
    mounted () {
        this.fetchImages();
    },
    methods: {
        fetchImages () {
            axios.get('/api/images').then((res) => {
                this.images = res.data
            })
        },
        like (imageId, isLike) {
            axios.post('/api/like', {image_id: imageId, is_like: isLike }).then((res) => {
                const imageIndex = this.images.findIndex(i => i.id === imageId)
                this.images[imageIndex] = res.data
            })
        }
    }
}
</script>

<style></style>
