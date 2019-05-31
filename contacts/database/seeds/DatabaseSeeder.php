<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call('UserTableSeeder');
        $this->call('ContactTableSeeder');
        

    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        factory(App\User::class, 0)->create()->each(function ($p) {
            $p->save();
        });
    }

}

class ContactTableSeeder extends Seeder {

    public function run()
    {
        /*(App\Contact::class, 100)->create()->each(function ($p) {
            $p->save();
        });*/
        factory(App\Address::class, 100)->create();
    }

}