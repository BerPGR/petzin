<template>

    <Head :title="$page.component" />
    <div class="min-h-screen w-full text-[#303030]">
        <h1 class="font-medium text-5xl w-2/4">Olá, Usuário! Pronto para cuidar do seu pet hoje?</h1>

        <div class="flex flex-wrap gap-2 mt-10">
            <button v-for="opt in options" :key="opt" @click="toggle(opt)"
                class="px-5 py-2 rounded-full border transition" :class="selected.includes(opt)
                    ? 'bg-[#FF7043] text-white font-medium'
                    : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50'">
                {{ opt }}
            </button>
        </div>

        <div class="flex items-center mt-5 gap-20">
            <input v-model="search" type="text" placeholder="Nome do petshop"
                class="p-3 bg-gray-200 border-2 border-gray-200 rounded-lg w-3/5 focus:bg-white focus:border-gray-200 focus:outline-none">
            <select name="" id="" placeholder="Selecione serviços"
                class="p-3 border-2 border-gray-200 rounded-lg w-1/5">

                <option value="Aberto">Aberto</option>
            </select>
            <select name="" id="" class="p-3 border-2 border-gray-200 rounded-lg w-1/5">
                <option value="Aberto">Aberto</option>
            </select>
        </div>

        <div class="grid grid-cols-3 gap-10 mt-20">
            <div class="shadow-lg rounded-lg flex flex-col cursor-pointer" v-for="petshop in filteredPetshops" @click="opened = petshop" :key="petshop.id">
                <img :src="petshop.image" class="object-cover w-full h-48 rounded-t-lg" />

                <div class="p-3 flex flex-col flex-1">
                    <div class="flex flex-col gap-3 mb-10">
                        <div class="flex items-start justify-between">
                            <h1 class="text-2xl font-bold">{{ petshop.name }}</h1>
                            <p class="flex gap-1 text-gray-700">
                                {{ petshop.average }}
                                <BiStar class="text-yellow-400" />
                            </p>
                        </div>

                        <div class="flex items-start gap-2 text-sm">
                            <EpLocation class="w-5 h-5" />
                            {{ petshop.street }}, {{ petshop.city }} - {{ petshop.uf }}, {{ petshop.zipCode }}
                        </div>

                        <div class="flex items-center gap-2 text-sm">
                            <BsTelephone class="w-4 h-4" />
                            {{ petshop.telephone }}
                        </div>
                    </div>

                    <!-- Rodapé grudado embaixo -->
                    <div class="flex items-start justify-between mt-auto">
                        <div class="flex items-center gap-4 w-full">
                            <template v-for="srv in petshop.services" :key="srv">
                                <img v-if="SERVICE_ICONS[srv]" :src="SERVICE_ICONS[srv]" :alt="srv" :title="srv"
                                    class="h-6 w-6" />
                            </template>
                        </div>
                        <p :class="petshop.status === 'Fechado' ? 'text-[#FF7043]' : 'text-[#008080]'">{{ petshop.status
                        }}</p>
                    </div>
                </div>
            </div>

        </div>
        <div v-if="opened" class="fixed inset-0 bg-black/20 grid place-items-center">
            <div class="bg-white rounded-xl w-[800px] max-w-[95vw]">
                <div class="p-4 border-b flex justify-between items-center">
                    <h2 class="text-xl font-bold">{{ opened.name }}</h2>
                    <button class="px-3 py-1" @click="opened = null">Fechar</button>
                </div>
                <Petshop :petshop="opened" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue'
import Drawer from '../Layouts/Drawer.vue';
import Petshop from './Petshop.vue'

import fachada from '@/assets/fachada.jpg'
import banho from '@/assets/banho.png'
import tosa from '@/assets/tosa.png'
import taxi from '@/assets/taxi.png'
import creche from '@/assets/creche.png'
import veterinario from '@/assets/veterinario.png'
import { BiStar } from 'vue-icons-plus/bi';
import { BsTelephone } from 'vue-icons-plus/bs';
import { EpLocation } from 'vue-icons-plus/ep';

const SERVICE_ICONS: Record<string, string> = {
    'Banho': banho,
    'Tosa': tosa,
    'Veterinário': veterinario,
    'Taxi': taxi,
    'Creche': creche,
}

const search = ref<string>("")
const options = ['Banho', 'Tosa', 'Veterinário', 'Taxi Pet', 'Creche']
const petshops = [
    { id: 1, name: "Pet Shop Legal", telephone: "(12) 3456-7890", city: "Brasília", uf: "DF", street: "Rua Fulano de Tal", zipCode: "70773-030", average: 4.8, image: fachada, status: 'Fechado', services: ['Banho', 'Tosa', 'Creche'] },
    { id: 2, name: "Pet Shop Massa", telephone: "(12) 3456-7890", city: "Brasília", uf: "DF", street: "Rua Fulano de Tal", zipCode: "70773-030", average: 4.8, image: fachada, status: 'Aberto', services: ['Banho', 'Veterinário', 'Taxi'] },
    { id: 3, name: "Pet Shop Animal", telephone: "(12) 3456-7890", city: "Brasília", uf: "DF", street: "Rua Fulano de Tal", zipCode: "70773-030", average: 4.8, image: fachada, status: 'Aberto', services: ['Banho', 'Tosa', 'Creche', 'Taxi'] },
    { id: 4, name: "Pet Shop Animal 2", telephone: "(12) 3456-7890", city: "Brasília", uf: "DF", street: "Rua Fulano de Tal", zipCode: "70773-030", average: 4.8, image: fachada, status: 'Aberto', services: ['Banho', 'Tosa', 'Creche', 'Taxi'] }
]
const selected = ref<string[]>([])
const normalizeService = (s: string) => (s === 'Taxi Pet' ? 'Taxi' : s)

const filteredPetshops = computed(() => {
    return petshops.filter(p => {
        // --- filtro pelo nome ---
        const matchName = p.name.toLowerCase().includes(search.value.toLowerCase().trim())

        // --- filtro pelos serviços ---
        if (selected.value.length === 0) {
            return matchName
        }

        const wanted = selected.value.map(normalizeService)
        const matchServices = wanted.every(w => p.services.includes(w))

        return matchName && matchServices
    })
})

function toggle(opt: string) {
    const i = selected.value.indexOf(opt)
    if (i >= 0) selected.value.splice(i, 1)
    else selected.value.push(opt)
}

const opened = ref<null | typeof petshops[number]>(null)

defineOptions({ layout: Drawer })
</script>
