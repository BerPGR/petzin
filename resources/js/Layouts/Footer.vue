<template>
    <footer class="p-10 bg-[#008080] text-white flex items-start justify-between gap-4 w-full mt-20">
        <img src="@/assets/petzin2.svg" class="w-1/12"/>
        <div class="flex flex-col items-start gap-4">
            <h1 class="text-xl font-semibold">Redes Sociais</h1>
            <a class="hover:underline text-lg" href="https://instagram.com/be_polaco">Instagram</a>
        </div>
        <div class="flex flex-col items-start gap-4">
            <h1 class="text-xl font-semibold">Contato</h1>
            <div class="flex items-center gap-2 text-lg">
                <AiOutlineMail />
                <span>contato@petzin.com</span>
            </div>
            <div class="flex items-center gap-2 text-lg">
                <CiLocationOn />
                <span>Brasília, Distríto Federal, Brasíl</span>
            </div>
        </div>
        <div class="flex flex-col items-start gap-4 font-semibold text-xl">
            <Link :href="route('home')" class="hover:underline">Home</Link>
            <Link :href="route('welcome')" class="hover:underline">Sobre</Link>
            <Link :href="route('contact')" class="hover:underline">Contato</Link>
            <Link :href="route('login')" class="hover:underline">Login</Link>
        </div>
    </footer>
</template>

<script setup>
import { AiOutlineMail } from 'vue-icons-plus/ai';
import { CiLocationOn } from 'vue-icons-plus/ci';
</script>