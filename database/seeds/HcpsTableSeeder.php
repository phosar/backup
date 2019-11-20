<?php

use Illuminate\Database\Seeder;
use App\Hcp;

class HcpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hcp = new \App\Hcp([
            'hcp_name' => 'Rose Rose',
            'hcp_email' => 'rose@gmail.com',
            'hcp_password' => Hash::make('1234567') 
        ]);
        $hcp->save();

        $hcp = new \App\Hcp([
            'hcp_name' => 'Jane Jane',
            'hcp_email' => 'jane@gmail.com',
            'hcp_password' => Hash::make('1234567') 
        ]);
        $hcp->save();
    }
}
