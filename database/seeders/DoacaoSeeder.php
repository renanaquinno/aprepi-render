<?php

namespace Database\Seeders;

use App\Models\Doacao;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DoacaoSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = User::all();

        if ($usuarios->count() == 0) {
            $this->command->info('Nenhum usuário encontrado. Crie usuários antes de rodar o seeder de doações.');
            return;
        }

        foreach ($usuarios as $usuario) {
            Doacao::factory()->count(rand(3, 10))->create([
                'user_id' => $usuario->id,
            ]);
        }
    }
}
