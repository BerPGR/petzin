<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { type Component, ref } from 'vue';
import LoginTutor from './LoginTutor.vue';
import LoginPetshop from './LoginPetshop.vue';
const activeComponent = ref<Component | null>(null)

const goBack = () => {
    activeComponent.value = null
}
</script>

<template>

    <Head title="Login" />
    <div class="min-h-[calc(100vh-8rem)] flex items-center justify-center">
        <div class="bg-[#FAFAFA] shadow-lg p-10 text-center min-w-[60%]" v-if="activeComponent === null">
            <h1 class="text-[#008080] font-bold text-5xl">Entrar</h1>
            <div class="flex items-center justify-around">
                <div class="flex flex-col items-center gap-4">
                    <h2 class="font-medium text-3xl text-[#303030]">Entre como</h2>
                    <img src="@/assets/petshop-choice.png" />
                    <h3 class="text-2xl font-bold text-[#008080]">Pet Shop</h3>
                    <button as="button" class="bg-[#FF7043] text-white font-semibold max-w-lg py-2 px-4 rounded-lg cursor-pointer" @click="activeComponent = LoginPetshop">
                        Entrar com Pet Shop
                    </button>
                    <p class="font-semibold">Ou</p>
                    <Link :href="route('register.petshop')" class="bg-transparent text-[#FF7043] border-2 border-[#FF7043] font-semibold max-w-lg py-2 px-4 rounded-lg cursor-pointer">
                    Cadastrar Pet Shop
                    </Link>
                </div>
                <div class="border-l-2 border-[#008080] min-h-full"></div>
                <div class="flex flex-col items-center gap-4">
                    <h2 class="font-medium text-3xl text-[#303030]">Entre como</h2>
                    <img src="@/assets/tutor-choice.png" />
                    <h3 class="text-2xl font-bold text-[#008080]">Tutor</h3>
                    <button @click="activeComponent = LoginTutor" class="bg-[#FF7043] text-white font-semibold max-w-lg py-2 px-4 rounded-lg cursor-pointer">
                        Entrar como Tutor
                    </button>
                    <p class="font-semibold">Ou</p>
                    <Link :href="route('register.tutor')" class="bg-transparent text-[#FF7043] border-2 border-[#FF7043] font-semibold max-w-lg py-2 px-4 rounded-lg cursor-pointer">
                    Cadastrar Tutor
                    </Link>
                </div>
            </div>
        </div>
        <div v-else class="bg-[#FAFAFA] shadow-lg text-center min-w-[60%]">
            <component :is="activeComponent" v-bind="{ goBack }"/>
        </div>
    </div>
</template>
