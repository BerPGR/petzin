<template>
  <div class="flex flex-col items-center gap-4">
    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="password">Senha</label>
      <input
        class="border-2 bg-white border-gray-300 rounded-lg p-2"
        type="password"
        id="password"
      />
    </div>

    
    <div class="flex flex-col w-[70%] mt-5">
      <label class="text-xl font-semibold" for="password_confirmation">Confirme sua senha</label>
      <input
        class="border-2 bg-white border-gray-300 rounded-lg p-2"
        type="password"
        id="password_confirmation"
      />
    </div>
  </div>
</template>