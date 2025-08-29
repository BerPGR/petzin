<template>
    <Head title="Contato" />
    <div class="flex justify-around min-h-[calc(100vh-7rem)] p-10">
        <div class="flex-col items-start space-y-8 w-1/3">
            <h1 class="font-bold text-[#008080] text-5xl flex gap-5">Contato <img src="../../assets/email-icon.svg"/></h1>
            <p class="text-lg leading-8">Tem alguma dúvida, sugestão, ou qualquer outro assunto que queria falar com a gente?
                Envie um email para:</p>
            <h2 class="font-bold text-[#008080] text-3xl">contato@petzin.com.br</h2>
            <p>Ou preencha o formulário ao lado.
                Vamos conversar!</p>

                <img src="../../assets/petzin2.svg" class="object-contain h-80"/>
        </div>
        <div class="border-l-2 border-[#008080] min-h-full"></div>
        <div class="w-1/3">
            <form class="flex flex-col space-y-8" @submit.prevent="">
                <div class="flex flex-col gap-1">
                    <label class="text-2xl font-medium" for="name">Nome Completo</label>
                    <input type="text" id="name" name="name" placeholder="Digite seu nome" class="p-2 border-2 rounded-lg border-gray-300">
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-2xl font-medium" for="option">Você é</label>
                    <select name="option" id="option" class="border-2 border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#008080]">
                        <option value="">Selecione uma opção</option>
                        <option value="tutor">Sou dono de pet</option>
                        <option value="petshop">Sou petshop</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-2xl font-medium" for="subject">Assunto</label>
                    <input class="border-2 border-gray-300 rounded-lg p-2" type="text" id="subject" name="subject" placeholder="O que você gostaria de falar conosco?">
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-2xl font-medium" for="message">Mensagem</label>
                    <textarea class="border-2 border-gray-300 rounded-lg p-2" id="message" name="message" />
                </div>
                <button type="submit" class="bg-[#FF7043] px-7 py-2 text-white font-medium text-lg rounded-lg cursor-pointer self-center">Enviar Mensagem</button>
            </form>
        </div>
    </div>
</template>
