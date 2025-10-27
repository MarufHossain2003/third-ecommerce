<?php

namespace Database\Seeders;

use App\Models\HomeBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $privacyPolicy = [
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum et voluptate neque nesciunt maiores, nulla similique, optio fugiat eius sequi, numquam alias possimus quibusdam velit unde. Dicta, non distinctio? Cupiditate.',
        ];

        HomeBanner::insert($privacyPolicy);
    }
}
