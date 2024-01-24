<?php

namespace Modules\Currency\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Currency\app\Models\MultiCurrency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currency = new MultiCurrency();
        $currency->currency_name = '$-USD';
        $currency->country_code = 'USD';
        $currency->currency_code = 'USD';
        $currency->currency_icon = '$';
        $currency->is_default = 'yes';
        $currency->currency_rate = 1;
        $currency->currency_position = 'before_price';
        $currency->status = 'active';
        $currency->save();
    }
}
