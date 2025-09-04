<template>
  <Head title="Registrar" />
  <div class="flex flex-col items-center min-h-[calc(100vh-10rem)]">
    <div class="flex items-center justify-between w-[50%] pb-4 mt-10">
      <div v-for="(stepper, i) in steps" :key="stepper" class="flex flex-col items-center">
        <div class="h-4 w-4 rounded-full" :class="i <= step ? 'bg-[#008080]' : 'bg-[#ff7043]'" />
        <h2>{{ stepper }}</h2>
      </div>
    </div>

    <div class="p-6 bg-gray-100 flex flex-col shadow-2xl min-w-[50%] rounded-2xl">
      <h1 class="text-3xl font-bold text-[#008080]">Passo {{ step + 1 }}: {{ steps[step] }}</h1>
      <form @submit.prevent="submit">
        <StepInfoPetshop v-model="form" v-if="step === 0" />
        <StepAddressPetshop v-model="form" v-else-if="step === 1" />
        <StepServicesPetshop v-model="form" v-else-if="step === 2" />
        <StepHourPetshop v-model="form" v-else-if="step === 3" />
        <StepPassword v-model="form" v-else-if="step === 4" />

        <div class="flex items-center justify-between mt-6">
          <button v-if="step > 0" @click.prevent.stop="previousStep" class="py-2 px-3 bg-[#008080] text-white font-bold rounded-lg cursor-pointer">Voltar</button>
          <div v-else />
          <button
            key="submit-btn"
            v-if="step === steps.length - 1"
            type="submit"
            class="cursor-pointer py-2 px-3 bg-[#ff7043] text-white font-bold rounded-lg"
          >
            <span v-if="!loading">Registrar</span>
            <Spinner v-else />
          </button>
          <button
            key="next-btn"
            v-else
            type="button"
            @click.prevent.stop="nextStep"
            class="py-2 px-3 bg-[#ff7043] text-white font-bold rounded-lg cursor-pointer"
          >
            Próximo
          </button>
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

// Helpers
const ptToIsoDay: Record<string, string> = {
  Dom: 'sun', Seg: 'mon', Ter: 'tue', Qua: 'wed', Qui: 'thu', Sex: 'fri', Sab: 'sat',
};

type ServiceInput = {
  name: string;
  description?: string | null;
  price: number | null;
  duration_minutes: number | null;
  available_days: string[]; // ['mon', 'wed', ...]
  start_time: string | null;
  end_time: string | null;
};

type RegisterForm = {
  // user (comum)
  name: string | null;
  email: string | null;
  telephone: string | null;
  password: string | null;
  password_confirmation: string | null;

  // perfil do petshop
  profile: {
    document: string | null;
    responsable_name: string | null;
    image: File | null;

    zip_code: string | null;
    uf: string | null;
    city: string | null;
    street: string | null;
    number: string | null;
    neighboorhood: string | null;

    hour_open: string | null;
    hour_close: string | null;
    working_days: string[]; // ['mon', 'tue', ...]
    description: string | null;
  };

  // serviços do petshop
  services: ServiceInput[];
};

const form = useForm<RegisterForm>({
  name: null,
  email: null,
  telephone: null,
  password: null,
  password_confirmation: null,

  profile: {
    document: null,
    responsable_name: null,
    image: null,
    zip_code: null,
    uf: null,
    city: null,
    street: null,
    number: null,
    neighboorhood: null,
    hour_open: null,
    hour_close: null,
    working_days: [], // já em ISO ('mon', 'tue', ...)
    description: null,
  },

  services: [],
});

const loading = ref(false);
const steps: string[] = ['Informações do Pet Shop', 'Endereço', 'Serviços Oferecidos', 'Horários de Funcionamento', 'Confirmação'];
const step = ref<number>(0);

const nextStep = () => { step.value++; };
const previousStep = () => { step.value--; };

const submit = () => {
  form.profile.working_days = (form.profile.working_days || []).map(d => ptToIsoDay[d] ?? d);

  form.transform((data) => data)
      .post('/petshops', {
        forceFormData: true,
        onStart: () => (loading.value = true),
        onFinish: () => (loading.value = false),
      });
};
</script>
