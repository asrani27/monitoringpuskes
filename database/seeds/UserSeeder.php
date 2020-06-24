<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s = new \App\User;
        $s->name = 'Administration';
        $s->email = 'admin@admin.com';
        $s->username = 'superadmin';
        $s->password = bcrypt('admin');
        $s->save();
    }
}
