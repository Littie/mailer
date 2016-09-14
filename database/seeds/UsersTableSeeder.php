<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['id' => 1,
            'name' => 'Artem',
            'email' => 'lara.test.it@gmail.com',
            'password' => '$2y$10$ujNmNrb37uVehR4O5W1zS.CTByrFfK6XV1P2PEeaFX7JsCOKV2NrG',
            'email_password' => encrypt('laratestit')
        ]);
    }
}
