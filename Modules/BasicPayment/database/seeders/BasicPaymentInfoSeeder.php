<?php

namespace Modules\BasicPayment\database\seeders;

use Illuminate\Database\Seeder;

use  Modules\BasicPayment\app\Models\BasicPayment;

class BasicPaymentInfoSeeder extends Seeder
{

    public function run(): void
    {
        $basic_payment_info = [
            "stripe_key" => "stripe_key",
            "stripe_secret" => "stripe_secret",
            "stripe_currency_id" => 1,
            "stripe_status" => "active",
            "stripe_charge" => 0.00,
            "stripe_image" => "stripe_image.jpg",
            "paypal_client_id" => "paypal_client_id",
            "paypal_secret_key" => "paypal_secret_key",
            "paypal_account_mode" => "sandbox",
            "paypal_currency_id" => 1,
            "paypal_charge" => 0.00,
            "paypal_status" => "active",
            "paypal_image" => "paypal_image.jpg",
            "bank_information" => "Bank Name => Your bank name\r\nAccount Number =>  Your bank account number\r\nRouting Number => Your bank routing number\r\nBranch => Your bank branch name",
            "bank_status" => "active",
            "bank_image" => "bank_image.jpg",
            "bank_charge" => 0.00,
            "bank_currency_id" => 1
        ];

        foreach($basic_payment_info as $index => $payment_item){
            $new_item = new BasicPayment();
            $new_item->key = $index;
            $new_item->value = $payment_item;
            $new_item->save();
        }
    }
}
