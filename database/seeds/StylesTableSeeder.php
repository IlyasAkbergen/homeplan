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
                'Измир',
                'Кайсери',
                'Каир',
                'Киото',
                'Мехико',
                'Нью Дели',
                'Нэшвилл',
                'Пусан',
                'Сан-Паулу',
                'Талдыкорган',
                'Феникс',
                'Шарлот',
            ],
            'Для маленьких квартир' => [
                'Вена',
                'Верона',
                'Гильзенкирхен',
                'Грац',
                'Дрезден',
                'Кёльн',
                'Костанай',
                'Ля-рошель',
                'Монтевидео',
                'Онтарио',
                'Париж',
                'Роттердам',
                'Цинциннати',
                'Эссен',
            ],
            'Дорогие интерьеры' => [
                'Амстердам',
                'Астана',
                'Лас Вегас',
                'Манчестер',
                'Милан',
                'Неаполь',
                'Осака',
                'Таллин',
                'Хьюстон',
                'Цюрих',
            ],
            'Интерьеры с цветовой гаммой' => [
                'Бремен',
                'Гаага',
                'Донецк',
                'Коломбо',
                'Купертино',
                'Манила',
                'Мельбурн',
                'Палермо',
                'Тунис',
                'Урумчи',
            ],
            'Классические' => [
                'Амстердам',
                'Венеция',
                'Мадрид',
                'Макао',
                'Манчестер',
                'Неаполь',
                'Оксфорд',
                'Пхеньян',
                'Таллин',
                'Цюрих',
            ],
            'Необычные' => [
                'Бамберг',
                'Бишкек',
                'Гаага',
                'Купертино',
                'Лестер',
                'Мюнхен',
                'Ташкент',
                'Уральск',
                'Филадельфия',
                'Чикаго',
            ],
            'Популярные интерьеры' => [
                'Актобе',
                'Амстердам',
                'Багдат',
                'Бангкок',
                'Бирмингем',
                'Загреб',
                'Мумбаи',
                'Одесса',
                'Рим',
                'Тблиси',
                'Улан Батор',
                'Ханой',
                'Чикаго',
            ],
            'Современные' => [
                'Алматы',
                'Бостон',
                'Брюссель',
                'Глазго',
                'Дублин',
                'Киев',
                'Куала Лумпур',
                'Ларнака',
                'Лондон',
                'Минск',
                'Монреаль',
                'Пекин',
                'Познань',
                'Прага',
                'Санкт-Петербур',
                'Сантьяго',
            ],
            'Скандинавские' => [
                'Альборг',
                'Атырау',
                'Гётеборг',
                'Копенгаген',
                'Корк',
                'Осло',
                'Рейкьявик',
                'Хельсинки',
                'Эдинбург',
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
