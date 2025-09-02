<template>
  <div class="flex flex-col items-center gap-4 text-[#303030]">
    <h2 class="text-2xl font-semibold mt-4">Selecione as opções oferecidas pelo seu petshop</h2>
    <div class="flex flex-col w-[70%] mt-5 gap-4">
        <div class="flex items-center gap-2">
          <input class="peer appearance-none w-5 h-5 rounded-md border-2 border-gray-400 checked:bg-[#008080] checked:border-teal-600" type="checkbox" name="Banho" id="banho">
          <label class="font-medium text-xl" for="banho">Banho</label>
        </div>
        <div class="flex items-center gap-2">
          <input class="peer appearance-none w-5 h-5 rounded-md border-2 border-gray-400 checked:bg-[#008080] checked:border-teal-600" type="checkbox" name="Tosa" id="tosa">
          <label class="font-medium text-xl" for="tosa">Tosa</label>
        </div>
        <div class="flex items-center gap-2">
          <input class="peer appearance-none w-5 h-5 rounded-md border-2 border-gray-400 checked:bg-[#008080] checked:border-teal-600" type="checkbox" name="Creche" id="creche">
          <label class="font-medium text-xl" for="creche">Creche</label>
        </div>
        <div class="flex items-center gap-2">
          <input class="peer appearance-none w-5 h-5 rounded-md border-2 border-gray-400 checked:bg-[#008080] checked:border-teal-600" type="checkbox" name="Veterinário" id="vet">
          <label class="font-medium text-xl" for="vet">Veterinário</label>
        </div>
        <div class="flex items-center gap-2">
          <input class="peer appearance-none w-5 h-5 rounded-md border-2 border-gray-400 checked:bg-[#008080] checked:border-teal-600" type="checkbox" name="Taxi" id="taxi">
          <label class="font-medium text-xl" for="taxi">Taxi Pet</label>
        </div>
    </div>
      
  </div>
</template>

<script setup lang="ts">

</script>
