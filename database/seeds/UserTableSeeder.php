<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Kamlesh Shrestha',
            'email' => 'eidia313@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
