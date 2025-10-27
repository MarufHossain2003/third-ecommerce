<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            [
                'phone' => '1234567890',
                'email' => 'info@gmail.com',
                'address' => 'Dhak, Bangladesh',
                'facebook' => 'https://www.facebook.com/',
                'twiter' => 'https://www.twiter.com/',
                'instagram' => 'https://www.instagram.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'youtube' => 'https://www.youtube.com/',
                'logo' => 'logo.png',
            ],
        ];
        Setting::insert($setting);
    }
}
