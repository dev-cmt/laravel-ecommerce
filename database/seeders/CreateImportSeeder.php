<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * KEY : MULTIPERMISSION
     */
    
    public function run(): void
    {

        $stores = [
            [
                'store_name' => 'Center Store',
                'store_code' => 'CS001', // Unique code for the store
                'manager_id' => 1, // Assuming a manager with ID 1 exists
                'address' => 'Gulshan',
                'district' => 'Dhaka',
                'division' => 'Dhaka',
                'postal_code' => '1212',
                'phone' => '0123456789',
                'email' => 'center.store@example.com',
                'description' => 'This is the center store.',
                'status' => true,
            ],
            [
                'store_name' => 'Gulshan Store',
                'store_code' => 'GS002',
                'manager_id' => 1,
                'address' => 'Gulshan',
                'district' => 'Dhaka',
                'division' => 'Dhaka',
                'postal_code' => '1212',
                'phone' => '0123456789',
                'email' => 'gulshan.store@example.com',
                'description' => 'This is the Gulshan store.',
                'status' => true,
            ],
            [
                'store_name' => 'Shariatpur Store',
                'store_code' => 'SS003',
                'manager_id' => 1,
                'address' => 'Shariatpur',
                'district' => 'Shariatpur',
                'division' => 'Barisal',
                'postal_code' => '1234',
                'phone' => '0123456789',
                'email' => 'shariatpur.store@example.com',
                'description' => 'This is the Shariatpur store.',
                'status' => true,
            ],
        ];
        
        DB::table('stores')->insert($stores);

        /**----------------------------------------
         * 
         */
        
         $store = [
            'VIP',
            'Regular'
        ];

        foreach ($store as $item) {
            DB::table('customer_groups')->insert(['name' => $item, 'description' => 'Admin Setup']);
        }
        /**------------------------------------------
         * 
         */
        DB::table('shipping_methods')->insert([
            'method_name' => 'Standard Shipping', 
            'description' => '3-5 days',
            'cost' => '150'
        ]);
    }
}
