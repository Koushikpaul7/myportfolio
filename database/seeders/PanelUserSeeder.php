<?php

namespace Database\Seeders;

use App\Models\PanelUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PanelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PanelUser::create([
        'name' => 'Koushik',
        'email' => 'koushik6211@gmail.com',
        'password' => Hash::make('koushik*#07'),
        'is_super' => true,
    ]);
    }
}
