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
                'name' => 'Кухня',
                'icon' => 'coffee',
            ],
            [
                'name' => 'Зал',
                'icon' => 'couch',
            ],
            [
                'name' => 'Гостиная',
                'icon' => 'door-open',
            ],
            [
                'name' => 'Спальня',
                'icon' => 'bed',
            ],
            [
                'name' => 'Санузел',
                'icon' => 'bath'
            ],
            [
                'name' => 'Балкон',
                'icon' => 'city'
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
