<template>
    <div>
        <div class="min-h-screen">
            <div class="h-16">
                <div class="w-full px-4 h-16 bg-sky-200 border-b border-sky-400 fixed" style="z-index: 100;">
                    <div class="text-3xl font-semibold h-full flex text-white items-center">
                        Docker-app
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