<template>
  <div class="flex flex-col items-center gap-4">
    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="zip-code">CEP</label>
      <input
        v-model="cep"
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
        <select
        @change="console.log(uf)"
        v-model="uf"
          class="border-2 bg-white border-gray-300 rounded-lg p-2"
          id="uf"
        >
          <option disabled value="">Selecione</option>
          <option v-for="uf in ufs" :key="uf" :value="uf">
            {{ uf }}
          </option>
        </select>
      </div>

      <div class="flex flex-col mt-5 w-3/5">
        <label class="text-xl font-semibold" for="city">Cidade</label>
        <input
        v-model="city"
          class="border-2 bg-white border-gray-300 rounded-lg p-2"
          type="text"
          id="city"
        />
      </div>
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="street">Logradouro</label>
      <input
      v-model="street"
        class="border-2 bg-white border-gray-300 rounded-lg p-2"
        type="text"
        id="street"
      />
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="number">Número</label>
      <input
      v-model="number"
        class="border-2 bg-white border-gray-300 rounded-lg p-2"
        type="number"
        id="number"
      />
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="neighboorhood">Bairro</label>
      <input
      v-model="neighboorhood"
        class="border-2 bg-white border-gray-300 rounded-lg p-2"
        type="text"
        id="neighboorhood"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import axios from 'axios';
import { debounce } from 'lodash';
import { ref, watch } from 'vue';

const uf = ref<string | null>(null)
const cep = ref<string>("")
const city = ref<string>("")
const neighboorhood = ref<string>("")
const number = ref<string>("")
const street = ref<string>("")

const ufs = [
  "AC","AL","AP","AM","BA","CE","DF","ES",
  "GO","MA","MT","MS","MG","PA","PB","PR",
  "PE","PI","RJ","RN","RS","RO","RR","SC",
  "SP","SE","TO"
];

watch(cep, debounce(async (v) => {
    const clean = (v || '').replace(/\D/g, '');
    if (clean.length !== 8) return;
    const { data } = await axios.get(`/cep/${clean}`);
    uf.value = data.uf
    city.value = data.localidade
    neighboorhood.value = data.bairro
    street.value = data.logradouro
}, 1000))
</script>
