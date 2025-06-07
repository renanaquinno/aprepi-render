<x-app-layout>
    <x-page-header 
    title="Contato"
    :breadcrumbs="[
        ['label' => 'Contato']
    ]"
    />
<div class="bg-white rounded-md mb-6">
    <div class="bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-bold text-blue-700 mb-4">Fale Conosco</h1>

        <p class="text-lg text-gray-700 mb-6">
            Caso tenha dúvidas, sugestões, ou queira saber mais sobre nosso trabalho, entre em contato preenchendo o formulário abaixo ou utilizando nossos canais de atendimento.
        </p>

        {{-- Informações de Contato --}}
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-blue-600 mb-2">Informações de Contato</h2>
            <p class="text-gray-700"><strong>Endereço:</strong> Rua Exemplo, 123 - Teresina, PI</p>
            <p class="text-gray-700"><strong>Telefone:</strong> (86) 99999-9999</p>
            <p class="text-gray-700"><strong>Email:</strong> contato@aprepi.org.br</p>
        </div>

        {{-- Formulário de Contato --}}
        <form action="#" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-1" for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required
                       class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1" for="email">Email</label>
                <input type="email" id="email" name="email" required
                       class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1" for="assunto">Assunto</label>
                <input type="text" id="assunto" name="assunto" required
                       class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1" for="mensagem">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="5" required
                          class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    Enviar Mensagem
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>