<x-app-layout>
 <x-page-header 
    title="Sobre nós"
    :breadcrumbs="[
        ['label' => 'Sobre nós']
    ]"
    />
<div class="bg-white rounded-md mb-6">
    <div class="bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-bold text-blue-700 mb-4">Sobre Nós</h1>

        <p class="text-lg text-gray-700 mb-4">
            O <strong>Sysprepi</strong> é um sistema desenvolvido para auxiliar a <strong>Associação de Pacientes Renais do Piauí (APREPI)</strong> na gestão de seus processos, voluntários, pacientes e ações sociais.
        </p>

        <p class="text-gray-700 mb-4">
            Nosso objetivo é proporcionar um sistema eficiente, moderno e intuitivo que facilite o trabalho da associação, além de promover transparência, organização e melhor atendimento aos pacientes e voluntários.
        </p>

        <p class="text-gray-700 mb-4">
            Acreditamos na força da solidariedade, na empatia e no compromisso com a saúde e bem-estar das pessoas que precisam de apoio no enfrentamento da insuficiência renal.
        </p>

        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-2">Nossa Missão</h2>
        <p class="text-gray-700 mb-4">
            Apoiar pacientes renais e seus familiares, oferecendo suporte social, emocional e logístico, contribuindo para uma melhor qualidade de vida.
        </p>

        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-2">Nossos Valores</h2>
        <ul class="list-disc list-inside text-gray-700 space-y-1">
            <li>Empatia e solidariedade</li>
            <li>Compromisso social</li>
            <li>Ética e transparência</li>
            <li>Respeito à vida e à dignidade humana</li>
            <li>Excelência no atendimento</li>
        </ul>

        <h2 class="text-2xl font-semibold text-blue-600 mt-6 mb-2">Entre em Contato</h2>
        <p class="text-gray-700">
            Se você deseja saber mais sobre nosso trabalho, contribuir ou se voluntariar, não hesite em <a href="{{ route('contato') }}" class="text-blue-700 hover:underline">entrar em contato</a> conosco.
        </p>
    </div>
</div>
</x-app-layout>
