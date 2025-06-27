<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The model that this factory is for.
     *
     * @var string
     */
    protected $model = \App\Models\User::class;

    /**
     
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'cpf'             => $this->faker->unique()->numerify('###########'),
            'nome_usuario'    => $this->faker->name(),
            'data_nascimento' => $this->faker->date('Y-m-d', '2005-01-01'),
            'email_usuario'   => $this->faker->unique()->safeEmail(),
            'senha'           => Hash::make('12345678'),
            'telefone'        => $this->faker->phoneNumber(),
        ];
    }
}
