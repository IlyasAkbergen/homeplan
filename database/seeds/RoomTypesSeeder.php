<?php

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room_types = [
            [
                'name' => 'Гостиная',
                'icon' => 'couch',
            ],
            [
                'name' => 'Кухня',
                'icon' => 'coffee',
            ],
            [
                'name' => 'Спальня',
                'icon' => 'bed',
            ],
            [
                'name' => 'Детская',
                'icon' => 'baby',
            ],
            [
                'name' => 'Санузел',
                'icon' => 'bath'
            ],
            [
                'name' => 'Прихожая',
                'icon' => 'hanukiah'
            ]
        ];

        foreach ($room_types as $room_type) {
            RoomType::create($room_type);
        }
    }
}
