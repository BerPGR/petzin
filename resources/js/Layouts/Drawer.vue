<!-- resources/js/Layouts/Drawer.vue -->
<template>
  <div class="min-h-screen">
    <!-- Sidebar fixa -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-[#008080] p-5">
      <img src="../../assets/drawer-logo.svg" class="mb-6" />
      <div class="text-white flex flex-col gap-2 items-stretch">
        <button class="flex items-center gap-2 w-full bg-white/20 p-2 rounded-lg"><BiHome /> Home</button>
        <button class="flex items-center gap-2 w-full bg-white/20 p-2 rounded-lg"><IoPawSharp /> Meus Pets</button>
        <button class="flex items-center gap-2 w-full bg-white/20 p-2 rounded-lg"><AiTwotoneCalendar /> Agendamentos</button>
        <button class="flex items-center gap-2 w-full bg-white/20 p-2 rounded-lg"><IpSettingTwo /> Configurações</button>
      </div>
    </aside>

    <!-- Conteúdo da página -->
    <main class="ml-64 p-12">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { AiTwotoneCalendar } from 'vue-icons-plus/ai'
import { BiHome } from 'vue-icons-plus/bi'
import { IoPawSharp } from 'vue-icons-plus/io'
import { IpSettingTwo } from 'vue-icons-plus/ip'
</script>
