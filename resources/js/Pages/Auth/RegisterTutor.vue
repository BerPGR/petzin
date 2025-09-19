<template>

    <Head title="Registrar" />
    <div class="flex flex-col items-center min-h-[calc(100vh-10rem)]">
        <div class="relative w-[50%] pb-4 mt-10">
            <!-- trilho -->
            <div class="absolute top-2 left-0 right-0 h-1 bg-[#ff7043]/30 rounded-full"></div>
            <!-- progresso -->
            <div class="absolute top-2 left-0 h-1 bg-[#008080] rounded-full transition-[width] duration-500 ease-out"
                :style="{ width: `${(step / (steps.length - 1)) * 100}%` }"></div>

            <div class="relative flex items-center justify-between">
                <div v-for="(stepper, i) in steps" :key="stepper" class="flex flex-col items-center">
                    <div class="h-4 w-4 rounded-full transition-all duration-300 ease-out"
                        :class="i === step ? 'bg-[#008080] scale-110 shadow-md' : 'bg-[#ff7043] opacity-80'" />
                    <h2 class="mt-2 text-sm">{{ stepper }}</h2>
                </div>
            </div>
        </div>


        <div class="p-6 bg-gray-100 flex flex-col shadow-2xl min-w-[50%] rounded-2xl">
            <h1 class="text-3xl font-bold text-[#008080]">Passo {{ step + 1 }}: {{ steps[step] }}</h1>
            <form @submit.prevent="submit">
                <StepInfoTutor v-model="form" v-if="step === 0" />
                <StepAddressTutor v-model="form" v-if="step === 1" />
                <StepPetsTutor v-model="form" v-if="step === 2" />
                <StepPassword v-model="form" v-if="step === 3" />


                <div class="flex items-center justify-between mt-6">
                    <button v-if="step > 0" @click.prevent.stop="previousStep"
                        class="py-2 px-3 bg-[#008080] text-white font-bold rounded-lg cursor-pointer">Voltar</button>
                    <div v-else />
                    <button key="submit-btn" v-if="step === steps.length - 1" type="submit"
                        class="cursor-pointer py-2 px-3 bg-[#ff7043] text-white font-bold rounded-lg">
                        <span v-if="!loading">Registrar</span>
                        <Spinner v-else />
                    </button>
                    <button key="next-btn" v-else type="button" @click.prevent.stop="nextStep"
                        class="py-2 px-3 bg-[#ff7043] text-white font-bold rounded-lg cursor-pointer">
                        Próximo
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import StepInfoTutor from "../../Components/Auth/Register/Tutor/StepInfoTutor.vue"
import StepAddressTutor from "../../Components/Auth/Register/Tutor/StepAddressTutor.vue"
import StepPetsTutor from "../../Components/Auth/Register/Tutor/StepPetsTutor.vue"
import StepPassword from "../../Components/Auth/Register/Tutor/StepPassword.vue"


import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Spinner from '../../Components/Spinner.vue';

type PetsInfo = {
    name: string;
    image: string;
    age: string;
    type: 'dog' | 'cat';
    size: 'small' | 'medium' | 'big';
    weight: string;
    height: string;
    breed: string;
}

type RegisterForm = {
    name: string | null;
    email: string | null;
    telephone: string | null;
    password: string | null;
    password_confirmation: string | null;
    document: string | null;
    address: {
        zip_code: string | null;
        uf: string | null;
        city: string | null;
        street: string | null;
        number: string | null;
        neighborhood: string | null;
    }

    pets: PetsInfo[]
};

const form = useForm<RegisterForm>({
    name: null,
    email: null,
    telephone: null,
    password: null,
    password_confirmation: null,
    document: null,
    address: {
        zip_code: null,
        uf: null,
        city: null,
        street: null,
        number: null,
        neighborhood: null
    },

    pets: []
});

const loading = ref(false);
const steps: string[] = ['Dados Pessoais', 'Endereço', 'Cadastro de pets', 'Confirmação'];
const step = ref<number>(0);

const nextStep = () => { step.value++; };
const previousStep = () => { step.value--; };

const submit = () => {
    alert('Enviando formulário...');
    try {

    } catch (error) {
        console.error('Erro ao enviar o formulário:', error);
    }
    form.post('/register-tutor', {
        onStart: () => loading.value = true,
        onFinish: () => loading.value = false,
        onError: (e) => console.log(e),
    });
};
</script>
