<?php

use App\Models\Image;
use App\Models\Layout;
use Illuminate\Database\Seeder;
use App\Models\ApartmentComplex;

class ApartmentComplexesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $complexes = [
            [
                "name" => "ЖК АКВАРЕЛЬ",
                "address" => "улица Тлендиева, Алматы",
                "layouts" => [
                    [
                        "space"=>38,
                        "rooms_count"=>1,
                        "path"=>"images/layouts/Акварель1комн38м2.png"
                    ],
                    [
                        "space"=>59.1,
                        "rooms_count"=>2,
                        "path"=>"images/layouts/Акварель2комн59.1м2.png"
                    ],
                    [
                        "space"=>65,
                        "rooms_count"=>2,
                        "path"=>"images/layouts/Акварель2комн65м2.png"
                    ],
                    [
                        "space"=>79,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/Акварель3комн79м2.png"
                    ],
                    [
                        "space"=>82.3,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/Акварель3комн82.3м2.png"
                    ],
                    [
                        "space"=>84,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/Акварель3комн84м2.png"
                    ],
                    [
                        "space"=>85.7,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/Акварель3комн85.7м2.png"
                    ],
                    [
                        "space"=>104.5,
                        "rooms_count"=>4,
                        "path"=>"images/layouts/Акварель4комн104.5м2.png"
                    ]
                ],
            ],
            [
                "name" => "ЖК Дом на Абая",
                "address" => "улица Айманова стр. 120, Алматы",
                "layouts" => [
                    [
                        "space"=>55,
                        "rooms_count"=>1,
                        "path"=>"images/layouts/ДомАбая1комн55м2.png"
                    ],
                    [
                        "space"=>56.1,
                        "rooms_count"=>1,
                        "path"=>"images/layouts/ДомАбая1комн56.1 м2.png"
                    ],
                    [
                        "space"=>68.7,
                        "rooms_count"=>1,
                        "path"=>"images/layouts/ДомАбая1комн68.7м2.png"
                    ],
                    [
                        "space"=>69,
                        "rooms_count"=>1,
                        "path"=>"images/layouts/ДомАбая1комн69м2.png"
                    ],
                    [
                        "space"=>61.5,
                        "rooms_count"=>2,
                        "path"=>"images/layouts/ДомАбая2комн61.5м2.png"
                    ],
                    [
                        "space"=>108.9,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/ДомАбая3комн108.9м2.png"
                    ],
                    [
                        "space"=>147.4,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/ДомАбая3комн147.4м2.png"
                    ],
                    [
                        "space"=>150,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/ДомАбая3комн150м2.png"
                    ]
                ],
            ],
            [
                "name"=>"ЖК ЛЕГЕНДА",
                "address"=>"улица Манаса, Алматы",
                "layouts" => [
                    [
                        "space"=>38.5,
                        "rooms_count"=>1,
                        "path"=>"images/layouts/Легенда1комн38.5м2.svg"
                    ],
                    [
                        "space"=>38,
                        "rooms_count"=>1,
                        "path"=>"images/layouts/Легенда1комн38м2.svg"
                    ],
                    [
                        "space"=>40.8,
                        "rooms_count"=>2,
                        "path"=>"images/layouts/Легенда2комн40.8м2.svg"
                    ],
                    [
                        "space"=>45.4,
                        "rooms_count"=>2,
                        "path"=>"images/layouts/Легенда2комн45.4м2.svg"
                    ],
                    [
                        "space"=>63.6,
                        "rooms_count"=>2,
                        "path"=>"images/layouts/Легенда2комн63.6м2.svg"
                    ],
                    [
                        "space"=>81.8,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/Легенда3комн81.8м2.svg"
                    ],
                    [
                        "space"=>90.4,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/Легенда3комн90.4м2.svg",
                    ],
                    [
                        "space"=>94.7,
                        "rooms_count"=>3,
                        "path"=>"images/layouts/Легенда3комн94.7м2.svg"
                    ],
                ],
            ],
        ];

        foreach ($complexes as $item) {
            $complex = ApartmentComplex::create([
                'name' => $item['name'],
                'address' => $item['address']
            ]);

            $layoutArr = collect();

            foreach ($item['layouts'] as $layout_item){
                $layout = Layout::create([
                    'space' => $layout_item['space'],
                    'rooms_count' => $layout_item['rooms_count']
                ]);

                $image = Image::create([
                    'model_id' => $layout->id,
                    'model_type' => Layout::class,
                    'path' => $layout_item['path'],
                    'name' => explode('/', $layout_item['path'])[2]
                ]);

                $layoutArr->push($layout->id);
            }

            $complex->layouts()->attach($layoutArr);

        }
    }
}
