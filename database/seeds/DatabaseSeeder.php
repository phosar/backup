<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HcpsTableSeeder::class);
        $this->call(SupplementCategoriesTableSeeder::class);
        $this->call(SupplementSuppliersTableSeeder::class);
    }
}
