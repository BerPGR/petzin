<template>
    <div class="flex">
        <div class="w-2/5 bg-gradient-to-br from-[#008080] to-[#00B9B9] h-full flex flex-col items-center p-4 text-white">
            <img src="@/assets/logo-login.svg"/>
            <h2 class="text-center font-semibold text-2xl">Faça seu login e tenha mais praticidade em sua vida com seu pet!</h2>
        </div>
        <div class="w-3/5 p-3">
            <div class="flex items-center justify-between">
                <button class="flex items-center cursor-pointer" @click="goBack"><BiChevronLeft class="text-black"/> Voltar</button>
                <img src="@/assets/tutor-choice.png"/>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const { goBack } = defineProps<{ goBack: () => void }>()

import { BiChevronLeft } from 'vue-icons-plus/bi';
</script>
