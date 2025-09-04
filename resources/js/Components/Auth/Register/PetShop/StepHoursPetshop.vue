<template>
  <div class="flex flex-col items-center gap-4">
    <div class="flex item-center justify-between w-[70%]">
      <div class="flex flex-col mt-5 w-2/5">
        <label class="text-xl font-semibold" for="open">Hora de Abertura</label>
        <input v-model="model.profile.hour_open" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="time" id="open" />
      </div>

      <div class="flex flex-col mt-5 w-2/5">
        <label class="text-xl font-semibold" for="close">Hora de Fechamento</label>
        <input v-model="model.profile.hour_close" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="time" id="close" />
      </div>
    </div>

    <div class="flex items-center justify-between w-[70%] flex-wrap gap-3">
      <label v-for="d in days" :key="d" class="flex items-center gap-2">
        <input
          type="checkbox"
          :value="d"
          v-model="selectedDays"
          class="peer appearance-none w-5 h-5 rounded-md border-2 border-gray-400 checked:bg-[#008080] checked:border-teal-600"
        />
        <span class="text-md">{{ d }}</span>
      </label>
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="additional">Descrição adicional</label>
      <textarea
        v-model="model.profile.description"
        placeholder="Digite alguma informação necessária a respeito do petshop"
        class="border-2 bg-white border-gray-300 rounded-lg p-2"
        id="additional"
        rows="4"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { watch, ref } from 'vue';

const model = defineModel<{
  profile: {
    hour_open: string | null;
    hour_close: string | null;
    working_days: string[]; // manteremos PT aqui e transformamos no submit do pai
    description: string | null;
  };
}>({
  type: Object,
  required: true
});

const days = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
const selectedDays = ref<string[]>(model.value.profile.working_days || []);

watch(selectedDays, (v) => {
  model.value.profile.working_days = v;
});
</script>
