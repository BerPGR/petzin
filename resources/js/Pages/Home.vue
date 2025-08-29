<template>

    <Head :title="$page.component" />
    <div class="min-h-screen w-full">
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
            <input type="text" placeholder="Nome do petshop"
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
            <div class="shadow-lg rounded-lg" v-for="petshop in filteredPetshops" :key="petshop.id">
                <img :src="petshop.image" class="object-cover w-full h-56 rounded-t-lg" />
                <div class="p-3 flex-col items-start justify-between">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-start justify-between">
                            <h1 class="text-2xl font-bold">{{ petshop.name }}</h1>
                            <p class="flex gap-1 text-gray-700">{{ petshop.average }}
                                <BiStar class="text-yellow-400" />
                            </p>
                        </div>
                        <div class="flex items-start gap-2">
                            <EpLocation />
                            {{ petshop.street }}, {{ petshop.city }} - {{ petshop.uf }}, {{ petshop.zipCode }}
                        </div>
                        <div class="flex items-start gap-2">
                            <BsTelephone />
                            {{ petshop.telephone }}
                        </div>
                    </div>
                    <div class="flex items-start justify-between mt-5">
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
    </div>
</template>

<script setup lang="ts">
import fachada from '@/assets/fachada.jpg'
import banho from '@/assets/banho.png'
import tosa from '@/assets/tosa.png'
import taxi from '@/assets/taxi.png'
import creche from '@/assets/creche.png'
import veterinario from '@/assets/veterinario.png'
import { computed, ref } from 'vue'
import Drawer from '../Layouts/Drawer.vue';
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

const options = ['Banho', 'Tosa', 'Veterinário', 'Taxi Pet', 'Creche']
const petshops = [
    { id: 1, name: "Pet Shop Animal", telephone: "(12) 3456-7890", city: "Brasília", uf: "DF", street: "Rua Fulano de Tal", zipCode: "70773-030", average: 4.8, image: fachada, status: 'Fechado', services: ['Banho', 'Tosa', 'Creche'] },
    { id: 2, name: "Pet Shop Animal", telephone: "(12) 3456-7890", city: "Brasília", uf: "DF", street: "Rua Fulano de Tal do caralho", zipCode: "70773-030", average: 4.8, image: fachada, status: 'Aberto', services: ['Banho', 'Veterinário', 'Taxi'] },
    { id: 3, name: "Pet Shop Animal", telephone: "(12) 3456-7890", city: "Brasília", uf: "DF", street: "Rua Fulano de Tal", zipCode: "70773-030", average: 4.8, image: fachada, status: 'Aberto', services: ['Banho', 'Tosa', 'Creche', 'Taxi'] }
]
const selected = ref<string[]>([])
const normalizeService = (s: string) => (s === 'Taxi Pet' ? 'Taxi' : s)

const filteredPetshops = computed(() => {
    if (selected.value.length === 0) return petshops

    const wanted = selected.value.map(normalizeService)

    return petshops.filter(p =>
        wanted.every(w => p.services.includes(w))
    )
})

function toggle(opt) {
    const i = selected.value.indexOf(opt)
    if (i >= 0) selected.value.splice(i, 1)
    else selected.value.push(opt)
}

defineOptions({ layout: Drawer })
</script>
