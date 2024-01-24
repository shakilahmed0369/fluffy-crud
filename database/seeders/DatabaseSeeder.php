<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\MenuBuilder\database\seeders\MenuBuilderDatabaseSeeder;
use Modules\PageBuilder\database\seeders\PageBuilderDatabaseSeeder;
use Modules\GlobalSetting\database\seeders\GlobalSettingInfoSeeder;
use Modules\GlobalSetting\database\seeders\CustomPaginationSeeder;
use Modules\GlobalSetting\database\seeders\EmailTemplateSeeder;
use Modules\GlobalSetting\database\seeders\SeoInfoSeeder;
use Modules\BasicPayment\database\seeders\BasicPaymentInfoSeeder;
use Modules\Language\database\seeders\LanguageSeeder;
use Modules\Currency\database\seeders\CurrencySeeder;
use Modules\PaymentGateway\database\seeders\PaymentGatewaySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            GlobalSettingInfoSeeder::class,
            BasicPaymentInfoSeeder::class,
            CustomPaginationSeeder::class,
            EmailTemplateSeeder::class,
            PageBuilderDatabaseSeeder::class,
            MenuBuilderDatabaseSeeder::class,
            CurrencySeeder::class,
            PaymentGatewaySeeder::class,
            SeoInfoSeeder::class,
            RolePermissionSeeder::class,
            AdminInfoSeeder::class
        ]);
    }
}
