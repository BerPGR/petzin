<template>
    <div class="flex">
        <div class="w-2/5 bg-gradient-to-br from-[#008080] to-[#00B9B9] min-h-full flex flex-col items-center p-4 text-white rounded-bl-lg rounded-tl-lg">
            <img src="@/assets/logo-login.svg"/>
            <h2 class="text-center font-semibold text-2xl">Faça seu login e tenha mais praticidade em sua vida com seu pet!</h2>
        </div>
        <div class="w-3/5 p-3 flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <button class="flex items-center cursor-pointer" @click="goBack"><BiChevronLeft class="text-black"/> Voltar</button>
                <img src="@/assets/tutor-choice.png" class="h-10 w-10"/>
            </div>
            <h1 class="text-center text-[#008080] font-extrabold text-4xl">Bem-Vindo, Tutor!</h1>

            <div class="flex flex-col w-4/5 self-center">
                <label class="self-start" for="email">E-Mail</label>
                <input v-model="form.email" class="p-3 bg-gray-200 border-2 border-gray-200 rounded-lg  focus:bg-white focus:border-gray-200 focus:outline-none" id="email" name="email" type="email" placeholder="Digite seu e-mail"/>
            </div>

            <div class="flex flex-col w-4/5 self-center mt-2">
                <label for="password" class="self-start">Senha</label>
                <input v-model="form.password" class="p-3 bg-gray-200 border-2 border-gray-200 rounded-lg w- focus:bg-white focus:border-gray-200 focus:outline-none" id="password" name="password" type="password" placeholder="Digite sua senha"/>
            </div>

            <div class="flex flex-col w-4/5 self-center mt-2 gap-4 pb-4">
                <button @click="submit" class="w-full bg-[#ff7043] p-2 rounded-lg font-bold text-white cursor-pointer">Entrar</button>
                <p>Ou</p>
                <Link :href="route('register.tutor')" class="w-full border-2 border-[#FF7043] p-2 rounded-lg font-bold text-[#FF7043] cursor-pointer">Cadastre-se</Link>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
const { goBack } = defineProps<{ goBack: () => void }>()
import { useForm } from '@inertiajs/vue3';
import { BiChevronLeft } from 'vue-icons-plus/bi';

const form = useForm({
    email: '',
    password: '',
    role: 'tutor'
})

const submit = () => {
    form.post('/login-tutor', {
        onFinish: () => form.reset('password'),
        onError: (e) => console.log(e)
    })
}
</script>
