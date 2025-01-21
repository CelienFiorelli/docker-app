<template>
    <div>
        <div class="min-h-screen">
            <div class="h-16">
                <div class="w-full px-4 h-16 bg-zinc-100 border-b-4 border-sky-300 fixed" style="z-index: 100;">
                    <div class="text-3xl text-sky-300 font-semibold h-full flex items-center">
                        Nom
                    </div>
                </div>
            </div>
            <div class="mt-16">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "BaseUnAuth"
}
</script>