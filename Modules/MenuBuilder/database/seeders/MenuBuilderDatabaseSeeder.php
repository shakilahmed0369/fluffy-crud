<?php

namespace Modules\MenuBuilder\database\seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Language\app\Models\Language;
use Modules\MenuBuilder\app\Models\Menu;
use Modules\MenuBuilder\app\Models\MenuTranslation;
use Stichoza\GoogleTranslate\GoogleTranslate;

class MenuBuilderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $highestOrder = Menu::max('order') ?? 0;

        $menu = new Menu();
        $menu->route = 'homepage';
        $menu->status = 1;
        $menu->order = $highestOrder + 1;
        $menu->save();
        $languages = Language::all();
        if ($menu) {
            foreach ($languages as $language) {
                $menuTranslation = new MenuTranslation();
                $menuTranslation->lang_code = $language->code;
                $menuTranslation->menu_id = $menu->id;
                try {
                    $tr = new GoogleTranslate($language->code);
                    $afterTrans = $tr->translate('Home');
                    $menuTranslation->title = $afterTrans;
                } catch (\Throwable $th) {
                    $menuTranslation->title = 'Home';
                }
                $menuTranslation->save();
            }
        }
    }
}
