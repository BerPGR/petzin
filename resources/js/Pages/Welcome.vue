<template>

    <Head title="Bem-Vindo" />
    <div class="min-h-screen flex flex-col items-center">
        <section
            class="flex justify-between bg-[url('../../assets/welcome_bg.svg')] bg-no-repeat bg-cover bg-center min-h-[calc(100vh-10rem)] w-full pt-10">
            <div class="flex flex-col items-center gap-10 p-10">
                <h1 class="font-bold text-6xl w-2/3 text-center">Seu pet merece o melhor com</h1>
                <img src="../../assets/petzin_colored.svg" />
                <span class="text-2xl font-semibold">Agende banho, tosa e mais com poucos cliques!</span>
                <div class="flex items-center gap-10">
                    <Link :href="route('login')"
                        class="bg-[#ff7043] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#ff7043]/90 transition">
                    Sou dono de pet</Link>
                    <Link :href="route('login')"
                        class="bg-[#008080] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#008080]/90 transition">
                    Quero oferecer serviços</Link>
                </div>
            </div>
            <div class="w-1/2">
                <img src="../../assets/dogs&cat.svg" class="object-cover w-full" />
            </div>
        </section>
        <section class="w-full bg-[#008080] flex flex-col gap-10 items-center p-10">
            <h1 class="text-white p-2 font-bold text-3xl">Como funciona?</h1>
            <div class="flex items-center justify-evenly w-full">
                <div class="bg-white rounded-sm flex flex-col items-center gap-4 p-10">
                    <BiLocationPlus class="text-6xl text-[#008080]" />
                    <span class="font-semibold text-2xl">Encontre Petshops</span>
                    <p class="w-64 text-center">Procure petshops de maneira fácil e prática</p>
                </div>
                <div class="bg-white rounded-sm flex flex-col items-center gap-4 p-10">
                    <GrSchedule class="text-6xl text-[#008080]" />
                    <span class="font-semibold text-2xl">Agende Serviços</span>
                    <p class="w-64 text-center">Agende serviços para seu pet com poucos cliques</p>
                </div>
                <div class="bg-white rounded-sm flex flex-col items-center gap-4 p-10">
                    <FaDog class="text-6xl text-[#008080]" />
                    <span class="font-semibold text-lg">Serviços</span>
                    <p class="w-64 text-center">Ofereça serviços para donos de pets</p>
                </div>
            </div>
        </section>
        <section class="flex flex-col items-center gap-20 mt-20">
            <div class="flex items-start gap-10 justify-center">
                <img src="@/assets/dashboard.svg" class="w-1/4" />
                <div class="flex flex-col items-start w-1/3 gap-4">
                    <h1 class="text-3xl text-[#008080] font-semibold">
                        Dashboard intuitivo
                    </h1>
                    <p class="text-lg leading-[40px]">Tenha acesso a um painel exclusivo onde você pode visualizar, organizar e
                        gerenciar todos os
                        agendamentos feitos pelos tutores. O sistema do PetZin facilita o seu dia a dia, trazendo mais
                        controle sobre os horários, serviços oferecidos e perfil dos clientes. Tudo em um só lugar, com
                        praticidade e segurança.</p>
                </div>
            </div>
            <div class="flex items-start gap-10 justify-center">
                <div class="flex flex-col items-start justify-center w-1/3 gap-4 leading-[30px]">
                    <h1 class="text-3xl text-[#008080] font-semibold">Segurança para tutores </h1>
                    <p class="text-lg leading-[40px]">Tenha acesso a um painel exclusivo onde você pode visualizar, organizar e gerenciar todos os
                        agendamentos feitos pelos tutores. O sistema do PetZin facilita o seu dia a dia, trazendo mais
                        controle sobre os horários, serviços oferecidos e perfil dos clientes. Tudo em um só lugar, com
                        praticidade e segurança.</p>
                </div>
                <img src="@/assets/security.svg" class="w-1/4" />
            </div>
        </section>
        <Footer/>
    </div>
</template>

<script setup>
import { BiLocationPlus } from 'vue-icons-plus/bi';
import { GrSchedule } from 'vue-icons-plus/gr';
import { FaDog } from 'vue-icons-plus/fa';
import Footer from '../Layouts/Footer.vue';
</script>