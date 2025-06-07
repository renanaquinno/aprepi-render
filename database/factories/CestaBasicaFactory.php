<?php
namespace Database\Factories;

use App\Models\CestaBasica;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CestaBasicaFactory extends Factory
{
    protected $model = CestaBasica::class;

    public function definition(): array
    {
        return [
            'data_recebimento' => $this->faker->date(),
            'entrada_tipo' => $this->faker->randomElement(['doacao', 'compra']),
            'origem' => User::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['disponivel', 'entregue']),
            'data_entrega' => $this->faker->optional()->date(),
            'user_id' => $this->faker->optional()->randomElement(User::pluck('id')->toArray()),
            'observacoes' => $this->faker->sentence(),
        ];
    }
}
