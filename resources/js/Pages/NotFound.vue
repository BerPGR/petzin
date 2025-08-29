<template>
    <Head title="Not Found"/>
    <div class="min-h-[calc(100vh-9rem)] flex flex-col justify-center items-center gap-8">
        <img src="../../assets/notfound.svg" />
        <h1 class="font-bold text-[#008080] text-4xl">Ops! Deu 404...</h1>
        <p class="text-xl">A página que você procura não existe ou não está disponível</p>
        <Link class="text-white bg-[#FF7043] p-3 rounded-lg font-medium" :href="route('home')">Voltar para a tela inicial</Link>
    </div>
</template>
