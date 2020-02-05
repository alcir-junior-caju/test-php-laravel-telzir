<?php

use Illuminate\Database\Seeder;
use App\User;
use Modules\Calls\Seeds\CallTableSeeder;
use Modules\Plans\Seeds\PlanTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CallTableSeeder::class,
            PlanTableSeeder::class,
        ]);
        $this->createAdmin();
    }

    private function createAdmin()
    {
        $data = [
            'email' => 'admin@telzir.com',
            'name' => 'Admin [Telzir]',
            'password' => bcrypt('telzirTest123')
        ];

        User::create($data);

        $this->command->info("O usuário {$data['name']} <{$data['email']}> / telzirTest123 criado com sucesso!");
    }
}
