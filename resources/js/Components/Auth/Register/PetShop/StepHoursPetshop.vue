<template>
  <div class="flex flex-col items-center gap-4">
    <div class="flex item-center justify-between w-[70%]">
      <div class="flex flex-col mt-5 w-2/5">
        <label class="text-xl font-semibold" for="open">Hora de Abertura</label>
        <input
        v-model="hora"
        @input="console.log"
          class="border-2 bg-white border-gray-300 rounded-lg p-2"
          type="time"
          id="close"
        />
      </div>

      <div class="flex flex-col mt-5 w-2/5">
        <label class="text-xl font-semibold" for="close">Hora de fechamento</label>
        <input
          class="border-2 bg-white border-gray-300 rounded-lg p-2"
          type="time"
          id="close"
        />
      </div>
    </div>

    <div class="flex items-center justify-between w-[70%]">
        <div v-for="day in days" :key="day" class="flex items-center gap-2">
            <input class="peer appearance-none w-5 h-5 rounded-md border-2 border-gray-400 checked:bg-[#008080] checked:border-teal-600" type="checkbox" name="" :id="day">
            <label class="text-md" :for="day">{{ day }}</label>
        </div>
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="additional">Descrição adicional</label>
      <textarea
      placeholder="Digite alguma informação necessária a respeito do petshop"
        class="border-2 bg-white border-gray-300 rounded-lg p-2"
        type="text"
        id="additional"
      />
    </div>
</div>
</template>

<script setup>
import { ref } from 'vue'
const hora = ref(null)

const days = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"]
</script>
