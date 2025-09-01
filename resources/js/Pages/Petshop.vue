<template>
    <Head title="Petshop"/>
    <div class="text-[#303030]">
        <img src="@/assets/fachada.jpg" class="w-full h-100 object-cover rounded-2xl"/>
        <h1 class="font-bold text-4xl mt-6">Pet Shop Master Animal</h1>
        <div class="flex items-center gap-4 mt-6">
            <div class="bg-[#FF7043]/20 text-[#FF7043] font-semibold rounded-full py-2 px-5">Banho</div>
            <div class="bg-[#FF7043]/20 text-[#FF7043] font-semibold rounded-full py-2 px-5">Tosa</div>
            <div class="bg-[#FF7043]/20 text-[#FF7043] font-semibold rounded-full py-2 px-5">Veterinário</div>
            <div class="bg-[#FF7043]/20 text-[#FF7043] font-semibold rounded-full py-2 px-5">Creche</div>
        </div>
        <h2 class="mt-6">Rua Fulano de tal, 123, Brasília - DF, 70773-030</h2>


        <div class="flex flex-col gap-4">
            <h1 class="font-bold text-4xl mt-6">Descrição</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur nisi diam, at tincidunt felis condimentum vitae. Duis rutrum mauris laoreet enim blandit, quis ullamcorper lacus mattis. In et pharetra ex. Nunc porta turpis vel tincidunt sodales. Curabitur in leo condimentum, blandit lectus vitae, eleifend dui. Mauris placerat odio ac mollis accumsan. Vivamus dignissim ullamcorper leo nec placerat. Cras purus turpis, vestibulum id dignissim tristique, ultrices vitae mauris. Integer dapibus suscipit pharetra. Fusce mattis tortor nulla, nec auctor leo pellentesque in. Quisque ullamcorper maximus mauris a tincidunt. Nullam malesuada est lacus, in vehicula erat egestas ut. Curabitur urna orci, tincidunt.</p>
        </div>

        <div class="flex flex-col gap-4">
            <h1 class="font-bold text-4xl mt-6">Agendar Serviço</h1>
            <div>Card Aqui</div>
        </div>
    </div>
</template>

<script setup>
import Drawer from '../Layouts/Drawer.vue';

defineOptions({layout: Drawer})
defineProps({
    petshop: {
        required: true,
        type: Object
    }
})
</script>
