<template>
  <div class="flex flex-col items-center gap-10">
    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="name">Nome Completo</label>
      <input placeholder="Digite seu nome completo" v-model="model.name" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="name">
    </div>

    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="cpf">CPF</label>
      <input placeholder="Digite seu CPF" v-model="model.document" v-mask="'###.###.###-##'" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="cpf">
    </div>


    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="email">E-mail do petshop</label>
      <input placeholder="example@example.com" v-model="model.email" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="email" id="email">
    </div>

    <div class="flex flex-col w-[70%]">
        <label class="text-xl font-semibold" for="telefone">Telefone</label>
        <input placeholder="Digite seu telefone/celular" v-model="model.telephone" v-mask="['(##) ####-####', '(##) #####-####']" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="tel" id="telefone">
    </div>
  </div>
</template>

<script setup lang="ts">
const model = defineModel<{
  name: string | null;
  email: string | null;
  telephone: string | null;
  document: string | null;
}>({
  type: Object,
  required: true
});

</script>
