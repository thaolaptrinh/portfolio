<script setup>
import { useDark, useToggle } from '@vueuse/core'
import { ref, onMounted, onUnmounted, watch } from 'vue'
import { useI18n } from 'vue-i18n'
// import { useLocaleStore } from '@/stores/locale'

const { locale } = useI18n({ useScope: 'global' })

const isDarkMode = useDark('dark')
const toggleDarkMode = useToggle(isDarkMode)

const searchInput = ref()

const handleKeyUp = (e) => {
    if (e.ctrlKey && e.keyCode == 75) {
        e.preventDefault()
        searchInput.value.focus()
    }
}

watch(locale, (newLocale) => {
    useLocaleStore().setLocale(newLocale)
})

onMounted(() => {
    document.addEventListener('keydown', handleKeyUp)
})

onUnmounted(() => {
    document.removeEventListener('keydown', handleKeyUp)
})
</script>

<template>
    <header>
        <div class="cpk71 cdxms c5a0p cfwvb co6sp">
            <div class="creo2 ckjll cfwvb c4a0m flex items-center">
                <!-- Search form -->
                <form class="cm8gy c8pgj">
                    <div class="cnxqt cfwvb">
                        <div class="c8pgj">
                            <label class="c4g5b cme8e chipd" for="search">{{ $t('search') }}</label>
                            <div class="c5a0p c5c77 cfwvb">
                                <input id="search" type="search" class="c899y c8pgj cw009 cfi31" ref="searchInput"
                                    :placeholder="$t('search')" />
                                <div class="cfup8 c5a0p cqn5a chzqd c5u91 cfwvb">
                                    <svg class="csb3e c0vrt cjhbj cu9sk" viewBox="0 0 16 16"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="cwnoo"
                                            d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zm8.707 12.293a.999.999 0 11-1.414 1.414L11.9 13.314a8.019 8.019 0 001.414-1.414l2.393 2.393z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Light switch -->
                <div class="cfup8 c0bc4 c8r41 cfwvb">
                    <input type="checkbox" name="light-switch" id="light-switch" class="light-switch c4g5b" />
                    <label class="cgfjk c5c77 c94ja" for="light-switch" @click="toggleDarkMode()">
                        <svg class="cxg5x" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                            <path class="c40us"
                                d="M7 0h2v2H7zM12.88 1.637l1.414 1.415-1.415 1.413-1.413-1.414zM14 7h2v2h-2zM12.95 14.433l-1.414-1.413 1.413-1.415 1.415 1.414zM7 14h2v2H7zM2.98 14.364l-1.413-1.415 1.414-1.414 1.414 1.415zM0 7h2v2H0zM3.05 1.706 4.463 3.12 3.05 4.535 1.636 3.12z">
                            </path>
                            <path class="cwnoo" d="M8 4C5.8 4 4 5.8 4 8s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4Z"></path>
                        </svg>
                        <svg class="c2f3p cw2lf" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                            <path class="cwnoo"
                                d="M6.2 1C3.2 1.8 1 4.6 1 7.9 1 11.8 4.2 15 8.1 15c3.3 0 6-2.2 6.9-5.2C9.7 11.2 4.8 6.3 6.2 1Z">
                            </path>
                            <path class="c4foe"
                                d="M12.5 5a.625.625 0 0 1-.625-.625 1.252 1.252 0 0 0-1.25-1.25.625.625 0 1 1 0-1.25 1.252 1.252 0 0 0 1.25-1.25.625.625 0 1 1 1.25 0c.001.69.56 1.249 1.25 1.25a.625.625 0 1 1 0 1.25c-.69.001-1.249.56-1.25 1.25A.625.625 0 0 1 12.5 5Z">
                            </path>
                        </svg>
                        <span class="c4g5b">Switch to light / dark version</span>
                    </label>
                </div>

                <!-- Button -->
                <nuxt-link active-class="" exact-active-class="" class="cwlj7 c0kjz czzu3 csfon w-[85px]"
                    to="/subscribe">
                    {{ $t('subscribe') }}
                </nuxt-link>

                <select class="c899y csfon !pr-7 !py-[6px] cursor-pointer" v-model="locale"
                    @change="$event.target.blur()">
                    <option v-for="locale in $i18n.availableLocales" :key="`locale-${locale}`" :value="locale">
                        {{ locale === 'vi' ? '🇻🇳' : '🇺🇸' }} {{ locale }}
                    </option>
                </select>
            </div>
        </div>
    </header>
</template>
