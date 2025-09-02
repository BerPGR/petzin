<template>
    <Head title="Registrar"/>
    <div class="flex flex-col items-center min-h-[calc(100vh-10rem)]">
        <div class="flex items-center justify-between w-[50%] pb-4 mt-10">
            <div v-for="(stepper, i) in steps" :key="stepper" class="flex flex-col items-center">
                <div class="h-4 w-4 bg-[#008080] rounded-full" v-if="i <= step"></div>
                <div class="h-4 w-4 bg-[#ff7043] rounded-full" v-else></div>
                <h2>{{ stepper }}</h2>
            </div>
        </div>
        <div class="p-6 bg-gray-100 flex flex-col shadow-2xl min-w-[50%] rounded-2xl">
            <h1 class="text-3xl font-bold text-[#008080]">Passo {{ step+1 }}: {{ steps[step] }}</h1>
            <form @submit.prevent="submit">
                <StepInfoPetshop v-model="form" v-if="step === 0"/>
                <StepAddressPetshop v-model="form" v-else-if="step === 1"/>
                <StepServicesPetshop v-model="form" v-else-if="step === 2"/>
                <StepHourPetshop v-model="form" v-else-if="step === 3"/>
                <StepPassword v-model="form" v-else-if="step === 4" />
                <div class="flex items-center justify-between mt-6"> 
                    <button v-if="step > 0" @click.prevent.stop="previousStep" class="py-2 px-3 bg-[#008080] text-white font-bold rounded-lg">Voltar</button>
                    <div v-else></div>
                    <button key="submit-btn" v-if="step === steps.length - 1" type="submit" class="py-2 px-3 bg-[#ff7043] text-white font-bold rounded-lg">
                        <span v-if="!loading">Registrar</span>
                        <Spinner v-else />
                    </button>
                    <button key="next-btn" v-else type="button" @click.prevent.stop="nextStep"
                     class="py-2 px-3 bg-[#ff7043] text-white font-bold rounded-lg">Próximo</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import StepInfoPetshop from '../../Components/Auth/Register/PetShop/StepInfoPetshop.vue';
import StepAddressPetshop from '../../Components/Auth/Register/PetShop/StepAddressPetshop.vue';
import StepServicesPetshop from '../../Components/Auth/Register/PetShop/StepServicesPetshop.vue';
import StepHourPetshop from '../../Components/Auth/Register/PetShop/StepHoursPetshop.vue';
import StepPassword from '../../Components/Auth/Register/PetShop/StepPassword.vue';

import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Spinner from '../../Components/Spinner.vue';

const form = useForm({
    name: null,
    cnpj: null,
    responsable_name: null,
    email: null,
    telephone: null,
    image: null,
    zip_code: null,
    uf: null,
    city: null,
    street: null,
    number: null,
    neighboorhood: null,
    services: [],
    hour_open: null,
    hour_close: null,
    working_days: [],
    description: null,
    password: null,
    password_confirmation: null,
})

const submit = () => {
    console.log(form);
    
}

const nextStep = () => {
    step.value++
}

const previousStep = () => {
    step.value--
}

const steps: string[] = ["Informações do Pet Shop", "Endereço", "Serviços Oferecidos", "Horários de Funcionamento", "Confirmação"]
const step = ref<number>(0)
const loading = ref<boolean>(false)
</script>
