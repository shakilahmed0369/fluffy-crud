<?php

namespace Modules\PaymentGateway\database\seeders;

use Illuminate\Database\Seeder;
use  Modules\PaymentGateway\app\Models\PaymentGateway;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_info = [
            "razorpay_key" => "razorpay_key",
            "razorpay_secret" => "razorpay_secret",
            "razorpay_name" => "WebSolutionUs",
            "razorpay_description" => "This is test payment window",
            "razorpay_charge" => 0.00,
            "razorpay_theme_color" => "#6d0ce4",
            "razorpay_status" => "active",
            "razorpay_currency_id" => 1,
            "razorpay_image" => "razorpay_image.jpg",
            "flutterwave_public_key" => "flutterwave_public_key",
            "flutterwave_secret_key" => "flutterwave_secret_key",
            "flutterwave_app_name" => "WebSolutionUs",
            "flutterwave_charge" => 0.00,
            "flutterwave_currency_id" => 1,
            "flutterwave_status" => "active",
            "flutterwave_image" => "flutterwave_image.jpg",
            "paystack_public_key" => "paystack_public_key",
            "paystack_secret_key" => "paystack_secret_key",
            "paystack_status" => "active",
            "paystack_charge" => 0.00,
            "paystack_image" => "paystack_image.jpg",
            "paystack_currency_id" => 1,
            "mollie_key" => "mollie_key",
            "mollie_charge" => 0.00,
            "mollie_image" => "mollie_image.jpg",
            "mollie_status" => "active",
            "mollie_currency_id" => 1,
            "instamojo_account_mode" => "Sandbox",
            "instamojo_api_key" => "instamojo_api_key",
            "instamojo_auth_token" => "instamojo_auth_token",
            "instamojo_charge" => 0.00,
            "instamojo_image" => "instamojo_image.jpg",
            "instamojo_currency_id" => 1,
            "instamojo_status" => "active"
        ];

        foreach($payment_info as $index => $payment_item){
            $new_item = new PaymentGateway();
            $new_item->key = $index;
            $new_item->value = $payment_item;
            $new_item->save();
        }
    }
}
