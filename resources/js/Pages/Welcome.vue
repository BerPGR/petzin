<template>
    <Head title="Bem-Vindo"/>
    <div class="min-h-screen flex flex-col items-center">
        <section class="flex justify-between bg-[url('../../assets/welcome_bg.svg')] bg-no-repeat bg-cover bg-center h-screen w-full pt-10">
            <div class="flex flex-col items-center gap-10 p-10">
                <h1 class="font-bold text-6xl w-2/3 text-center">Seu pet merece o melhor com</h1>
                <img src="../../assets/petzin_colored.svg"/>
                <span class="text-2xl font-semibold">Agende banho, tosa e mais com poucos cliques!</span>
                <div class="flex items-center gap-10">
                    <Link :href="route('login')" class="bg-[#ff7043] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#ff7043]/90 transition">Sou dono de pet</Link>
                    <Link :href="route('login')" class="bg-[#008080] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#008080]/90 transition">Quero oferecer serviços</Link>
                </div>
            </div>
            <div class="w-1/2">
                <img src="../../assets/dogs&cat.svg" class="object-cover w-full"/>
            </div>
        </section>
        <section class="w-full bg-[#008080] flex flex-col gap-10 items-center p-10">
            <h1 class="text-white p-2 font-bold text-3xl">Como funciona?</h1>
            <div class="flex items-center justify-evenly w-full">
                <div class="bg-white rounded-sm flex flex-col items-center gap-4 p-10">
                    <BiLocationPlus class="text-6xl text-[#008080]"/>
                    <span class="font-semibold text-2xl">Encontre Petshops</span>
                    <p class="w-64 text-center">Procure petshops de maneira fácil e prática</p>
                </div>
                <div class="bg-white rounded-sm flex flex-col items-center gap-4 p-10">
                    <GrSchedule class="text-6xl text-[#008080]"/>
                    <span class="font-semibold text-2xl">Agende Serviços</span>
                    <p class="w-64 text-center">Agende serviços para seu pet com poucos cliques</p>
                </div>
                <div class="bg-white rounded-sm flex flex-col items-center gap-4 p-10">
                    <FaDog class="text-6xl text-[#008080]"/>
                    <span class="font-semibold text-lg">Serviços</span>
                    <p class="w-64 text-center">Ofereça serviços para donos de pets</p>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { BiLocationPlus } from 'vue-icons-plus/bi';
import { GrSchedule } from 'vue-icons-plus/gr';
import { FaDog } from 'vue-icons-plus/fa';
</script>