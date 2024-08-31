<template>
    <NuxtLoadingIndicator color="#29d" :height="2" :throttle="0" />
    <div class="cfbgr cpphc">
        <div class="ckb2r cfwvb">
            <DefaultNavigation />
            <main class="c08dn c4a0m cajes min-h-screen">
                <div class="csbbd c0bc4 cpphc cglmn c8pgj cfwvb">
                    <DefaultHeader />
                    <slot />
                    <DefaultFooter />
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import { useHead } from '@unhead/vue'

useHead({
    title: 'Portfolio',
    bodyAttrs: {
        class: 'c81c8 coo5n ce3nz cg0ht cpw1o cngo2 c9mf7'
    }
})

</script>

<style>
@import url("../assets/css/default.css");

::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-thumb {
    background: rgb(14, 165, 233);
    border-radius: 4px;
    cursor: pointer;
}

::-webkit-scrollbar-thumb:hover {
    background: rgb(2, 132, 199);
}
</style>
