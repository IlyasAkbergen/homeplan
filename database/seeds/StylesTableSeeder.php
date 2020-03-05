<?php

use App\Models\Style;
use Illuminate\Database\Seeder;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles = [
            'Бюджетные' => [
                'Веллингтон',
                'Доха',
                'Ереван',
                'Измир'
            ],
            'Скандинавские' => [
                'Альборг',
                'Гётеборг',
                'Осло',
            ],
        ];

        foreach ($styles as $style => $children) {
            $style = Style::create([
                'name' => $style,
            ]);

            $style->children()->createMany(
                collect($children)->map(function($item) use ($style) {
                    return ['name' => $item, 'parent_id' => $style->id];
                })
            );
        }
    }
}
