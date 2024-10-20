<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new User;
        $administrator->name        = "Administrator";
        $administrator->email       = "admin@gmail.com";
        $administrator->password    = \Hash::make("password");
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
