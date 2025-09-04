<template>
  <div class="flex flex-col items-center gap-4 text-[#303030]">
    <h2 class="text-2xl font-semibold mt-4">Selecione e configure os serviços oferecidos</h2>

    <!-- Seletor rápido -->
    <div class="flex flex-col w-[70%] mt-5 gap-3">
      <div class="flex items-center gap-2" v-for="preset in presets" :key="preset">
        <input
          :id="preset"
          type="checkbox"
          class="peer appearance-none w-5 h-5 rounded-md border-2 border-gray-400 checked:bg-[#008080] checked:border-teal-600"
          :checked="hasService(preset)"
          @change="togglePreset(preset)"
        />
        <label class="font-medium text-lg" :for="preset">{{ preset }}</label>
      </div>
    </div>

    <!-- Editor de serviços selecionados -->
    <div class="w-[70%] mt-6 space-y-6" v-if="model.services.length">
      <div v-for="(svc, idx) in model.services" :key="idx" class="bg-white rounded-xl p-4 border">
        <div class="flex items-center justify-between mb-2">
          <h3 class="text-xl font-semibold">{{ svc.name }}</h3>
          <button type="button" class="text-sm text-red-600" @click="removeService(idx)">Remover</button>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="text-sm font-semibold">Descrição (opcional)</label>
            <textarea v-model="svc.description" class="w-full border rounded p-2" rows="2" />
          </div>

          <div>
            <label class="text-sm font-semibold">Preço (R$)</label>
            <input v-model.number="svc.price" type="number" min="0" step="0.01" class="w-full border rounded p-2" />
          </div>

          <div>
            <label class="text-sm font-semibold">Duração (min)</label>
            <input v-model.number="svc.duration_minutes" type="number" min="1" class="w-full border rounded p-2" />
          </div>

          <div>
            <label class="text-sm font-semibold block">Dias disponíveis</label>
            <div class="flex flex-wrap gap-3 mt-2">
              <label v-for="d in days" :key="d.code" class="flex items-center gap-2">
                <input type="checkbox" :value="d.code" v-model="svc.available_days"
                       class="w-4 h-4 rounded border-gray-400 checked:bg-[#008080] checked:border-teal-600" />
                <span>{{ d.label }}</span>
              </label>
            </div>
          </div>

          <div>
            <label class="text-sm font-semibold">Início</label>
            <input v-model="svc.start_time" type="time" class="w-full border rounded p-2" />
          </div>

          <div>
            <label class="text-sm font-semibold">Fim</label>
            <input v-model="svc.end_time" type="time" class="w-full border rounded p-2" />
          </div>
        </div>
      </div>
    </div>

    <!-- Adição manual -->
    <div class="w-[70%] mt-4">
      <button type="button" class="py-2 px-3 bg-[#008080] text-white font-bold rounded-lg" @click="addBlank">
        + Adicionar serviço manualmente
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
type Service = {
  name: string;
  description?: string | null;
  price: number | null;
  duration_minutes: number | null;
  available_days: string[];
  start_time: string | null;
  end_time: string | null;
};

const model = defineModel<{ services: Service[] }>({
  type: Object,
  required: true
});

const presets = ['Banho', 'Tosa', 'Creche', 'Veterinário', 'Taxi Pet'];

const days = [
  { label: 'Dom', code: 'sun' },
  { label: 'Seg', code: 'mon' },
  { label: 'Ter', code: 'tue' },
  { label: 'Qua', code: 'wed' },
  { label: 'Qui', code: 'thu' },
  { label: 'Sex', code: 'fri' },
  { label: 'Sab', code: 'sat' }
];

const blankService = (name = ''): Service => ({
  name,
  description: null,
  price: null,
  duration_minutes: null,
  available_days: [],
  start_time: null,
  end_time: null
});

const hasService = (name: string) => model.value.services.some(s => s.name === name);
const togglePreset = (name: string) => {
  if (hasService(name)) {
    model.value.services = model.value.services.filter(s => s.name !== name);
  } else {
    model.value.services.push(blankService(name));
  }
};
const removeService = (idx: number) => {
  model.value.services.splice(idx, 1);
};
const addBlank = () => model.value.services.push(blankService());
</script>
