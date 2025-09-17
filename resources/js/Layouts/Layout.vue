<template>
    <div>
        <header class="h-20 bg-[#008080] w-full flex items-center justify-between text-white px-20 shadow-lg">
            <img src="../../assets/navbar-logo.png" class="object-contain"/>
            <nav>
                <div class="space-x-10 font-semibold">
                    <Link class="py-2 px-5 hover:text-[#008080] hover:bg-white border-white rounded-lg transition duration-200" :href="route('notfound')">Sobre</Link>
                    <Link class="py-2 px-5 hover:text-[#008080] hover:bg-white border-white rounded-lg transition duration-200" :href="route('contact')">Contato</Link>
                    <Link :href="route('login')" class="bg-[#FF7043] px-6 py-2 rounded-md">Login</Link>
                </div>
            </nav>
        </header>

        <main>
            <slot/>
        </main>

        <footer class="p-2 w-full text-center">
            Copyright © 2025 PetZin. Todos os direitos reservados.
        </footer>
    </div>
</template>
