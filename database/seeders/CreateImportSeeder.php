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

        /**-------------------------------------------------------------------------
         * STORE CREATE
         * -------------------------------------------------------------------------
         */

        $stores = [
            [
                'store_name' => 'Center Store',
                'store_code' => 'CS001',
                'manager_id' => 1,
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

        /**-------------------------------------------------------------------------
         * CUSTOMER GROUP CREATE
         * -------------------------------------------------------------------------
         */
        
         $customerGroup = [
            'VIP',
            'Regular'
        ];

        foreach ($customerGroup as $item) {
            DB::table('customer_groups')->insert(['name' => $item, 'description' => 'Admin Setup']);
        }
        

        /**-------------------------------------------------------------------------
         * SHIPPING METHOD CREATE
         * -------------------------------------------------------------------------
         */
        DB::table('shipping_methods')->insert([
            'method_name' => 'Standard Shipping', 
            'description' => '3-5 days',
            'cost' => '150',
            'is_active' => true
        ]);
        

        /**-------------------------------------------------------------------------
         * PAYMENT GATEWAY CREATE
         * -------------------------------------------------------------------------
         */
        DB::table('payment_gateways')->insert([
            // Card (Stripe/PayPal Example)
            [
                'name' => 'Card',
                'gateway_type' => 'Online',
                'description' => 'Credit and Debit Card Payment Gateway (e.g., Visa, MasterCard)',
                'api_key' => 'stripe_api_key_here',
                'merchant_id' => 'stripe_merchant_id_here',
                'secret_key' => 'stripe_secret_key_here',
                'payment_url' => 'https://api.stripe.com/v1/charges',
                'image_path' => 'images/payment_gateways/card_logo.png', // Adjust path as needed
                'is_active' => true,
                'currency' => 'USD',
                'priority' => 1,
            ],
            // bKash (Example for Bangladesh)
            [
                'name' => 'bKash',
                'gateway_type' => 'Online',
                'description' => 'Mobile payment gateway for Bangladesh (bKash)',
                'api_key' => 'bkash_api_key_here',
                'merchant_id' => 'bkash_merchant_id_here',
                'secret_key' => 'bkash_secret_key_here',
                'payment_url' => 'https://api.bkash.com/payment',
                'image_path' => 'images/payment_gateways/bkash_logo.png',
                'is_active' => true,
                'currency' => 'BDT',
                'priority' => 2,
            ],
            // Rocket (Another Bangladesh-based payment)
            [
                'name' => 'Rocket',
                'gateway_type' => 'Online',
                'description' => 'Mobile payment gateway for Bangladesh (Rocket)',
                'api_key' => 'rocket_api_key_here',
                'merchant_id' => 'rocket_merchant_id_here',
                'secret_key' => 'rocket_secret_key_here',
                'payment_url' => 'https://api.rocket.com/payment',
                'image_path' => 'images/payment_gateways/rocket_logo.png',
                'is_active' => true,
                'currency' => 'BDT',
                'priority' => 3,
            ],
            // Cash on Delivery (Manual Payment)
            [
                'name' => 'Cash on Delivery',
                'gateway_type' => 'Manual',
                'description' => 'Payment will be made upon delivery.',
                'api_key' => null,
                'merchant_id' => null,
                'secret_key' => null,
                'payment_url' => null,
                'image_path' => 'images/payment_gateways/cod_logo.png',
                'is_active' => true,
                'currency' => 'BDT',
                'priority' => 4,
            ],
            // Installment (Manual Payment)
            [
                'name' => 'Installment',
                'gateway_type' => 'Manual',
                'description' => 'Payment through installments over a period.',
                'api_key' => null,
                'merchant_id' => null,
                'secret_key' => null,
                'payment_url' => null,
                'image_path' => 'images/payment_gateways/installment_logo.png',
                'is_active' => true,
                'currency' => 'BDT',
                'priority' => 5,
            ],
            // Wallet (Manual Payment)
            [
                'name' => 'Wallet',
                'gateway_type' => 'Manual',
                'description' => 'Pay using a pre-funded wallet balance.',
                'api_key' => null,
                'merchant_id' => null,
                'secret_key' => null,
                'payment_url' => null,
                'image_path' => 'images/payment_gateways/wallet_logo.png',
                'is_active' => true,
                'currency' => 'BDT',
                'priority' => 6,
            ]
        ]);



    }
}
