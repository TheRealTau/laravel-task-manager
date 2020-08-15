<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Octavio',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345689')
        ]);
    
        \factory(User::class)->times(4)->create();
    }
}
