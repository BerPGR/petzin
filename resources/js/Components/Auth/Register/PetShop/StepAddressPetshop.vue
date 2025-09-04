<template>
  <div class="flex flex-col items-center gap-4">
    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="zip-code">CEP</label>
      <input
        v-model="model.profile.zip_code"
        v-mask="'#####-###'"
        inputmode="numeric"
        autocomplete="postal-code"
        class="border-2 bg-white border-gray-300 rounded-lg p-2"
        type="text"
        id="zip-code"
      />
    </div>

    <div class="flex item-center justify-between w-[70%]">
      <div class="flex flex-col mt-5">
        <label class="text-xl font-semibold" for="uf">UF</label>
        <select v-model="model.profile.uf" class="border-2 bg-white border-gray-300 rounded-lg p-2" id="uf">
          <option disabled value="">Selecione</option>
          <option v-for="uf in ufs" :key="uf" :value="uf">{{ uf }}</option>
        </select>
      </div>

      <div class="flex flex-col mt-5 w-3/5">
        <label class="text-xl font-semibold" for="city">Cidade</label>
        <input v-model="model.profile.city" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="city" />
      </div>
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="street">Logradouro</label>
      <input v-model="model.profile.street" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="street" />
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="number">Número</label>
      <input v-model="model.profile.number" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="number" />
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="neighboorhood">Bairro</label>
      <input v-model="model.profile.neighboorhood" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="neighboorhood" />
    </div>
  </div>
</template>

<script setup lang="ts">
const model = defineModel<{
  profile: {
    zip_code: string | null;
    uf: string | null;
    city: string | null;
    street: string | null;
    number: string | null;
    neighboorhood: string | null;
  };
}>({
  type: Object,
  required: true
});

import axios from 'axios';
import { debounce } from 'lodash';
import { watch } from 'vue';

const ufs = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];

watch(
  () => model.value.profile.zip_code,
  debounce(async (v) => {
    const clean = (v || '').replace(/\D/g, '');
    if (clean.length !== 8) return;
    const { data } = await axios.get(`/cep/${clean}`);
    model.value.profile.uf = data.uf;
    model.value.profile.city = data.localidade;
    model.value.profile.neighboorhood = data.bairro;
    model.value.profile.street = data.logradouro;
  }, 1000)
);
</script>
