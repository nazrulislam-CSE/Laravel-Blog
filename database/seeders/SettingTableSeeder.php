<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Session;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
            'site_name'      => 'Laravel Blog',
            'contact_number' => '8 800 567.890.11',
            'title'          => 'Seosight Company',
            'content'        => 'Seosight Company , Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat eleifend option nihil. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius parum claram.',
            'contact_email'  => 'info@seosight.com',
            'address'        => 'Melbourne, Australia'
        ]);
    }
}
