<x-app-layout>
    <x-page-header 
        title="Detalhes do Usuário"
        :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Usuários', 'url' => route('usuarios.index')],
            ['label' => 'Detalhes']
        ]"
    />

    <div class="py-2">
        <div class="bg-white rounded-md mb-6 p-4">
            <h2 class="text-2xl font-semibold mb-4">{{ $user->name }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>CPF:</strong> {{ $user->cpf }}</p>
                    <p><strong>Telefone:</strong> {{ $user->telefone }}</p>
                </div>
                <div>
                    <p><strong>Data de Nascimento:</strong> 
                        {{ $user->data_nascimento ? \Carbon\Carbon::parse($user->data_nascimento)->format('d/m/Y') : '-' }}
                    </p>
                    <p><strong>Tipo de Usuário:</strong> 
                        @switch($user->tipo_usuario)
                            @case('voluntario_ext')
                                Voluntário Externo
                                @break
                            @case('voluntario_adm')
                                Voluntário Administrativo
                                @break
                            @case('admin')
                                Administrador
                                @break
                            @case('socio')
                                Sócio
                                @break
                            @case('doador')
                                Doador
                                @break
                            @default
                                {{ ucfirst($user->tipo_usuario) }}
                        @endswitch
                    </p>
                                   

                    <p><strong>Data de Cadastro:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><strong>Endereço:</strong> {{ $user->endereco }}</p>
                    <p><strong>Cidade:</strong> {{ $user->cidade }}</p>
                    <p><strong>Estado:</strong> {{ $user->estado }}</p>
                    <p><strong>CEP:</strong> {{ $user->cep }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">Observações</h3>
                    <p class="mt-2 text-gray-700">
                    {{ $user->observacoes ?? 'Nenhuma observação adicionada.' }}
                    </p>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-4">
                {{-- Botão Voltar --}}
                <x-secondary-button onclick="window.location='{{ route('usuarios.index') }}'">
                Voltar
                </x-secondary-button>

                {{-- Botão Editar --}}
                <x-primary-button onclick="window.location='{{ route('usuarios.edit', $user) }}'" class="bg-blue-800 hover:bg-blue-900">
                Editar
                </x-primary-button>

                {{-- Botão Excluir --}}
                @if(auth()->user()->isAdmin())
                    <form action="{{ route('admin.usuarios.destroy', $user) }}" method="POST"
                    onsubmit="return confirm('Deseja realmente excluir este usuário?')">
                    @csrf
                    @method('DELETE')
                        <x-danger-button>
                        Excluir
                        </x-danger-button>
                    </form>
                @endif
            </div>

        </div>
    </div>
    
    <x-log-list :logs="$user->activities" />

</x-app-layout>
