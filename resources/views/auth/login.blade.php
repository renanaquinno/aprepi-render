<x-guest-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">Entrar no SYSPREPI</h1>

            <!-- Status de Sessão -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                    <x-text-input id="email" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Senha -->
                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-1">Senha</label>
                    <x-text-input id="password" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Lembrar-me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                           name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Lembrar-me</label>
                </div>

                <!-- Link e Botão -->
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            Esqueceu sua senha?
                        </a>
                    @endif

                    <x-primary-button class="bg-sky-800 hover:bg-sky-900">
                        Entrar
                    </x-primary-button>
                </div>
            </form>
    </div>
</x-guest-layout>
