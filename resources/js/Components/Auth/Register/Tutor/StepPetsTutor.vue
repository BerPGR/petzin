<template>
    <div v-if="isAdding" class="flex flex-col items-center gap-4">
        <div class="flex items-center justify-between w-[70%] mt-5 gap-4">
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="pet_name">Nome do pet</label>
                <input v-model="petInfo.name" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="text"
                    id="pet_name" />
            </div>
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="image">Imagem do pet</label>
                <input @input="addFileToPet" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="file" accept="image/"
                    id="image" />
            </div>
        </div>

        <div class="flex items-center justify-between w-[70%] mt-5 gap-4">
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold" for="age">Idade</label>
                <input v-model="petInfo.age" class="border-2 bg-white border-gray-300 rounded-lg p-2" type="number"
                    id="age" />
            </div>
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold">Tipo</label>
                <select class="p-2 border-2 border-gray-300 rounded-lg bg-white" v-model="petInfo.type">
                    <option disabled value="">Selecione</option>
                    <option value="dog">Cachorro</option>
                    <option value="cat">Gato</option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-between w-[70%] mt-5 gap-4">
            <div class="flex flex-col w-1/2">
                <label class="text-xl font-semibold">Porte</label>
                <select class="p-2 border-2 bg-white border-gray-300 rounded-lg" v-model="petInfo.size">
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

        <div class="w-[70%] flex items-center justify-between gap-4">
            <div></div>
            <button @click.prevent="addPet"
                class="text-white font-bold text-lg bg-[#ff7043] w-1/2 py-1 rounded-sm cursor-pointer">Adicionar
                pet</button>
        </div>
    </div>
    <div v-else class="">
        <div class="w-full flex flex-col gap-4">
            <h2 class="text-2xl font-bold text-[#303030] mt-4">Pets adicionados</h2>
            <div class="w-[70%] flex flex-col gap-4">
                <div v-for="(pet, index) in model.pets" :key="index"
                    class="border-2 border-gray-300 rounded-lg p-4 bg-white flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <img v-if="pet.image" :src="pet.image" alt="Pet Image"
                            class="w-16 h-16 object-cover rounded-full" />
                        <div>
                            <h3 class="text-xl font-semibold">{{ pet.name }}</h3>
                            <p>Idade: {{ pet.age }} anos</p>
                            <p>Tipo: {{ pet.type === 'dog' ? 'Cachorro' : 'Gato' }}</p>
                            <p>Porte:
                                <span v-if="pet.size === 'small'">Pequeno</span>
                                <span v-else-if="pet.size === 'medium'">Médio</span>
                                <span v-else>Grande</span>
                            </p>
                            <p>Peso: {{ pet.weight }} kg</p>
                            <p>Altura: {{ pet.height }} cm</p>
                            <p>Raça: {{ pet.breed }}</p>
                        </div>
                    </div>
                </div>
                <button @click.prevent="isAdding = true">Registrar Pet</button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue'

/** TIPOS idênticos aos do pai (mantém v-model consistente) */
type Pet = {
  name: string | null
  image: string | null   // preview url; se quiser enviar o File, crie um campo separado
  age: string | null
  type: 'dog' | 'cat'
  size: 'small' | 'medium' | 'big'
  weight: string | null
  height: string | null
  breed: string | null
}

type RegisterForm = {
  name: string | null
  email: string | null
  telephone: string | null
  password: string | null
  password_confirmation: string | null
  document: string | null
  address: {
    zip_code: string | null
    uf: string | null
    city: string | null
    street: string | null
    number: string | null
    neighborhood: string | null
  }
  pets: Pet[]
}

const model = defineModel<RegisterForm>({ required: true })

const isAdding = ref(false)
const petInfo = ref<Pet>({
  name: null,
  image: null,
  age: null,
  type: 'dog',
  size: 'small',
  weight: null,
  height: null,
  breed: null
})

function ensurePetsArray() {
  if (!Array.isArray(model.value.pets)) {
    console.warn('[StepPetsTutor] pets NÃO é array. Valor atual:', model.value.pets)
    model.value.pets = []
  }
}

function addPet() {
  ensurePetsArray()

  if (!petInfo.value.name || !petInfo.value.age || !petInfo.value.weight || !petInfo.value.height || !petInfo.value.breed) {
    alert('Por favor, preencha todos os campos do pet antes de adicionar.')
    return
  }

  model.value.pets.push({ ...petInfo.value })

  petInfo.value = {
    name: null,
    image: null,
    age: null,
    type: 'dog',
    size: 'small',
    weight: null,
    height: null,
    breed: null
  }

  isAdding.value = false
}

function addFileToPet(event: Event) {
  const target = event.target as HTMLInputElement
  const file = target.files ? target.files[0] : null
  petInfo.value.image = file ? URL.createObjectURL(file) : null // preview
}

/** Diagnóstico: loga reatribuições indevidas de pets (se algum step estragar o array) */
watch(
  () => model.value.pets,
  (val, old) => {
    // queremos detectar reatribuição, não mutação interna
    console.log('[StepPetsTutor] pets mudou:', { isArray: Array.isArray(val), val, old })
  },
  { deep: false }
)
</script>
