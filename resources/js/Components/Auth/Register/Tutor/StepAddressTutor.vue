<template>
  <div class="flex flex-col items-center gap-4">
    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="zip-code">CEP</label>
      <input placeholder="Digite seu CEP" v-model="model.address.zip_code" v-mask="'#####-###'" inputmode="numeric"
        autocomplete="postal-code" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="zip-code" />
    </div>

    <div class="flex item-center justify-between w-[70%]">
      <div class="flex flex-col mt-5">
        <label class="text-xl font-semibold" for="uf">UF</label>
        <select v-model="model.address.uf" class="border-2 bg-white border-gray-300 rounded-lg p-2" id="uf">
          <option disabled value="">Selecione</option>
          <option v-for="uf in ufs" :key="uf" :value="uf">{{ uf }}</option>
        </select>
      </div>

      <div class="flex flex-col mt-5 w-3/5">
        <label class="text-xl font-semibold" for="city">Cidade</label>
        <input placeholder="Digite a cidade" v-model="model.address.city" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text"
          id="city" />
      </div>
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="street">Logradouro</label>
      <input placeholder="Digite sua cidade" v-model="model.address.street" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text"
        id="street" />
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="number">Número</label>
      <input placeholder="Caso não haja, digite N/A" v-model="model.address.number"
        class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="number" />
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="neighboorhood">Bairro</label>
      <input placeholder="Digite seu bairro" v-model="model.address.neighboorhood" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text"
        id="neighboorhood" />
    </div>
  </div>
</template>

<script setup lang="ts">
const model = defineModel<{
  address: {
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

const ufs = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

watch(
  () => model.value.address.zip_code,
  debounce(async (v) => {
    const clean = (v || '').replace(/\D/g, '');
    if (clean.length !== 8) return;
    const { data } = await axios.get(`/cep/${clean}`);
    model.value.address.uf = data.uf;
    model.value.address.city = data.localidade;
    model.value.address.neighboorhood = data.bairro;
    model.value.address.street = data.logradouro;
  }, 1000)
);
</script>
