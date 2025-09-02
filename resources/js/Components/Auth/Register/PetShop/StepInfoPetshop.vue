<template>
    <div class="flex flex-col items-center gap-10">
        <div class="flex flex-col w-[70%] mt-5">
            <label class="text-xl font-semibold" for="name">Nome do pet shop</label>
            <input v-model="model.name" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="name">
        </div>
        <div class="flex flex-col w-[70%] mt-5">
            <label class="text-xl font-semibold" for="cnpj">CNPJ</label>
            <input v-model="model.cnpj" v-mask="'##.###.###/####-##'" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="cnpj">
        </div>
        <div class="flex flex-col w-[70%] mt-5">
            <label class="text-xl font-semibold" for="responsavel-person">Nome do responsável</label>
            <input v-model="model.responsable_name" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text" id="responsavel-person">
        </div>
        <div class="flex flex-col w-[70%] mt-5">
            <label class="text-xl font-semibold" for="email">E-mail do petshop</label>
            <input v-model="model.email" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="email" id="email">
        </div>
        <div class="flex item-center justify-between w-[70%]">
            <div class="flex flex-col mt-5">
                <label class="text-xl font-semibold" for="telefone">Telefone</label>
                <input v-model="model.telephone" v-mask="['(##) ####-####', '(##) #####-####']" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="tel" id="telefone">
            </div> 
            <div class="flex flex-col mt-5">
                <label class="text-xl font-semibold" for="image">Imagem do estabelecimento</label>
                <input accept="image/" @input="inputImage" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="file" id="image">
            </div> 
        </div>
    </div>
</template>

<script setup lang="ts">
const model = defineModel<{
    name: string;
    cnpj: string;
    responsable_name: string;
    email: string;
    telephone: string;
    image: string;
}>({
    type: Object,
    required: true
})

const inputImage = (e) => {
    model.value.image = e.target.files[0]
}
</script>