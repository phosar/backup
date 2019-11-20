<?php

use Illuminate\Database\Seeder;

class SupplementSuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new \App\SupplementSupplier([
            'supplier_name' => 'Emzor Supplier',
            'supplier_addr' => '123 Church Street',
            'supplier_phone' => '081234567',
            'supplier_email' => 'info@emzor.co.za'
        ]);
        $supplier->save();

        $supplier = new \App\SupplementSupplier([
            'supplier_name' => 'Green Life',
            'supplier_addr' => '123 Church Street',
            'supplier_phone' => '081234567',
            'supplier_email' => 'info@greenlife.co.za'
        ]);
        $supplier->save();

        $supplier = new \App\SupplementSupplier([
            'supplier_name' => 'Herbal Life',
            'supplier_addr' => '123 Church Street',
            'supplier_phone' => '081234567',
            'supplier_email' => 'info@herballife.co.za'
        ]);
        $supplier->save();
    }
}
