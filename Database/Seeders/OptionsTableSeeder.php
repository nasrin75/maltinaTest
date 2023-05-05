<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'id' => 1,
                'title' => 'skim',
                'custom_option_id' => 2,
            ],
            [
                'id' => 2,
                'title' => '',
                'custom_option_id' => 2,
            ],
            [
                'id' => 3,
                'title' => 'semi',
                'custom_option_id' => 2,
            ],
            [
                'id' => 4,
                'title' => 'whole',
                'custom_option_id' => 1,
            ],
            [
                'id' => 5,
                'title' => 'small',
                'custom_option_id' => 1,
            ],
            [
                'id' => 6,
                'title' => 'medium',
                'custom_option_id' => 1,
            ],
            [
                'id' => 7,
                'title' => 'large',
                'custom_option_id' => 3,
            ],
            [
                'id' => 8,
                'title' => 'single',
                'custom_option_id' => 3,
            ],
            [
                'id' => 9,
                'title' => 'double',
                'custom_option_id' => 3,
            ],
            [
                'id' => 10,
                'title' => 'triple',
                'custom_option_id' => 4,
            ],
            [
                'id' => 11,
                'title' => 'chocolate chip',
                'custom_option_id' => 4,
            ],
            [
                'id' => 12,
                'title' => 'ginger',
                'custom_option_id' => 5,
            ],
            [
                'id' => 13,
                'title' => 'take away',
                'custom_option_id' => 5,
            ],
            [
                'id' => 14,
                'title' => 'in shop',
                'custom_option_id' => 6,
            ],
        ];

        foreach ($options as $key => $option) {
            Option::create([
                'id' => $option['id'],
                'title' => $option['title'],
                'custom_option_id' => $option['custom_option_id'],
            ]);
        }
    }
}
