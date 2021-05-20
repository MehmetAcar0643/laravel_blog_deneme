<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                [
                    'description' => 'Baslik',
                    'key' => 'title',
                    'value' => 'Mehmet ACAR Kişisel Blog',
                    'type' => 'text',
                    'must' => '0',
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Açıklama',
                    'key' => 'description',
                    'value' => 'Mehmet ACAR Kişisel Blog açıklama',
                    'type' => 'text',
                    'must' => '1',
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Logo',
                    'key' => 'logo',
                    'value' => 'logo.png',
                    'type' => 'file',
                    'must' => '2',
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Icon',
                    'key' => 'icon',
                    'value' => 'icon.ico',
                    'type' => 'file',
                    'must' => '3',
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Anahtar Kelimeler',
                    'key' => 'keywords',
                    'value' => 'mehhmet,acar,kişisel,blog',
                    'type' => 'text',
                    'must' => '4',
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Telefon',
                    'key' => 'telefon',
                    'value' => '05443417371',
                    'type' => 'text',
                    'must' => '5',
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Mail Kişisel',
                    'key' => 'mail',
                    'value' => 'mehmetacar0643@gmail.com',
                    'type' => 'text',
                    'must' => '6',
                    'delete' => '0',
                    'status' => '1'
                ],
            ]
        );
    }
}
