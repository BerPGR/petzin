<template>
    <div class="flex flex-col items-center gap-4">
        <div class="flex items-center justify-between w-[70%] mt-5 gap-4">
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="pet_name">Nome do pet</label>
                <input v-model="model.pets" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text"
                    id="pet_name" />
            </div>
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="image">Imagem do pet</label>
                <input class="border-2 bg-white border-gray-300 rounded-lg p-2" type="file" accept="image/"
                    id="image" />
            </div>
        </div>

        <div class="flex items-center justify-between w-[70%] mt-5 gap-4">
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="age">Idade</label>
                <input v-model="petInfo.name" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="number"
                    id="age" />
            </div>
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold">Tipo</label>
                <select class="p-2 border-2 border-gray-200 rounded-lg bg-white"  v-model="petInfo.type">
                    <option disabled value="">Selecione</option>
                    <option value="dog">Cachorro</option>
                    <option value="cat">Gato</option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-between w-[70%] mt-5 gap-4">
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold">Porte</label>
                <select class="p-2 border-2 border-gray-200 bg-white rounded-lg" v-model="petInfo.size">
                    <option disabled value="">Selecione</option>

                    <option value="small">Pequeno</option>
                    <option value="medium">Médio</option>
                    <option value="big">Grande</option>
                </select>
            </div>
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="weight">Peso</label>
                <input type="number" v-model="petInfo.weight" id="weight"
                    class="border-2 bg-white border-gray-300 rounded-lg p-2" />
            </div>
        </div>

        <div class="flex items-center justify-between w-[70%] mt-5 gap-4">
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="height">Altura</label>
                <input v-model="petInfo.height" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="number"
                    id="height" />
            </div>
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="breed">Raça</label>
                <input type="text" v-model="petInfo.breed" id="breed"
                    class="border-2 bg-white border-gray-300 rounded-lg p-2" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
type Pet = {
    name: string | null;
    image: string | null;
    age: string | null;
    type: 'dog' | 'cat';
    size: 'small' | 'medium' | 'big';
    weight: string | null;
    height: string | null;
    breed: string | null;
}

const model = defineModel<{
    pets: Pet[]
}>({
    type: Object,
    required: true
});

const isRegistering = ref(false)
const petInfo: Pet = {
    name: null,
    image: null,
    age: null,
    type: 'dog',
    size: 'small',
    weight: null,
    height: null,
    breed: null,
}
</script>
