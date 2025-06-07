<x-app-layout>
<div class="bg-white rounded-md mb-6">
    <div class="bg-white shadow-md rounded-lg p-8">
        {{-- Imagem Central --}}
        <div class="flex justify-center mb-6">
        <img src="{{ asset('images/voluntariado.png') }}" alt="Voluntariado" class="w-1/2 object-contain">
        </div>

        {{-- Título --}}
        <h1 class="text-3xl sm:text-4xl font-bold text-blue-700 mb-4">
            Seja um voluntário
        </h1>

        {{-- Versículo --}}
        <p class="text-lg text-gray-700 mb-6">
            A alma generosa prosperará e aquele que atende também será atendido. <br>
            <span class="italic text-gray-500">Provérbios 11:25</span>
        </p>

        {{-- Botão de Ação --}}
        <a href="#"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md shadow-md transition">
            Solicitar cadastro para voluntário
        </a>
    </div>
</div>
</x-app-layout>
