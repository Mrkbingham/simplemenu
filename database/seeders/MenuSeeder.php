<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * The breakfast menu items.
     *
     * @var array<array<string, mixed>>
     */
    public $breakfastItems = [
        [
            'name' => 'Eggs',
            'description' => 'Two eggs, any style',
            'price' => 5.99,
        ],
        [
            'name' => 'Pancakes',
            'description' => 'Three pancakes with butter and syrup',
            'price' => 6.99,
        ],
        [
            'name' => 'French Toast',
            'description' => 'Three slices of french toast with butter and syrup',
            'price' => 6.99,
        ],
        [
            'name' => 'Bacon',
            'description' => 'Three slices of bacon',
            'price' => 3.99,
        ],
        [
            'name' => 'Sausage',
            'description' => 'Three sausage links',
            'price' => 3.99,
        ],
        [
            'name' => 'Toast',
            'description' => 'Two slices of toast with butter and jelly',
            'price' => 2.99,
        ],
        [
            'name' => 'Hash Browns',
            'description' => 'A pile of hash browns',
            'price' => 3.99,
        ],
        [
            'name' => 'Coffee',
            'description' => 'A cup of coffee',
            'price' => 1.99,
        ],
        [
            'name' => 'Orange Juice',
            'description' => 'A glass of orange juice',
            'price' => 1.99,
        ],
    ];

    /**
     * The lunch menu items.
     *
     * @var array<array<string, mixed>>
     */
    public $lunchItems = [
        [
            'name' => 'Hamburger',
            'description' => 'A hamburger with lettuce, tomato, and onion',
            'price' => 7.99,
        ],
        [
            'name' => 'Cheeseburger',
            'description' => 'A cheeseburger with lettuce, tomato, and onion',
            'price' => 8.99,
        ],
        [
            'name' => 'Bacon Cheeseburger',
            'description' => 'A bacon cheeseburger with lettuce, tomato, and onion',
            'price' => 9.99,
        ],
        [
            'name' => 'Grilled Cheese',
            'description' => 'A grilled cheese sandwich',
            'price' => 5.99,
        ],
        [
            'name' => 'BLT',
            'description' => 'A bacon, lettuce, and tomato sandwich',
            'price' => 6.99,
        ],
        [
            'name' => 'Chicken Sandwich',
            'description' => 'A grilled chicken sandwich with lettuce, tomato, and onion',
            'price' => 8.99,
        ],
        [
            'name' => 'Fries',
            'description' => 'A basket of french fries',
            'price' => 3.99,
        ],
        [
            'name' => 'Onion Rings',
            'description' => 'A basket of onion rings',
            'price' => 4.99,
        ],
        [
            'name' => 'Soda',
            'description' => 'A can of soda',
            'price' => 1.99,
        ],
        [
            'name' => 'Iced Tea',
            'description' => 'A glass of iced tea',
            'price' => 1.99,
        ],
    ];

    /**
     * The dinner menu items.
     *
     * @var array<array<string, mixed>>
     */
    public $dinnerItems = [
        [
            'name' => 'Steak',
            'description' => 'A steak with a side of vegetables',
            'price' => 19.99,
        ],
        [
            'name' => 'Chicken',
            'description' => 'A chicken breast with a side of vegetables',
            'price' => 14.99,
        ],
        [
            'name' => 'Salmon',
            'description' => 'A salmon filet with a side of vegetables',
            'price' => 16.99,
        ],
        [
            'name' => 'Pasta',
            'description' => 'Pasta with your choice of sauce',
            'price' => 12.99,
        ],
        [
            'name' => 'Soup',
            'description' => 'A bowl of soup',
            'price' => 4.99,
        ],
        [
            'name' => 'Salad',
            'description' => 'A salad with your choice of dressing',
            'price' => 5.99,
        ],
        [
            'name' => 'Bread',
            'description' => 'A basket of bread',
            'price' => 2.99,
        ],
        [
            'name' => 'Wine',
            'description' => 'A glass of wine',
            'price' => 5.99,
        ],
        [
            'name' => 'Beer',
            'description' => 'A bottle of beer',
            'price' => 3.99,
        ],
        [
            'name' => 'Water',
            'description' => 'A glass of water',
            'price' => 0.99,
        ],
    ];


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create three fake menu categories - breakfast lunch and dinner
        \App\Models\MenuCategory::factory()->create([
            'name' => 'Breakfast',
            'description' => 'The things you like in the morning - or whenever really.  Breakfast all day!',
        ]);

        // Loop through and create the breakfast menu items
        foreach ($this->breakfastItems as $item) {
            \App\Models\MenuItem::factory()->create([
                'name' => $item['name'],
                'description' => $item['description'],
                'unit_price' => $item['price'],
                'menu_category_id' => 1,
            ]);
        }

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Lunch',
            'description' => 'The things you like in the afternoon - or whenever really.  Lunch all day!',
        ]);

        // Loop through and create the lunch menu items
        foreach ($this->lunchItems as $item) {
            \App\Models\MenuItem::factory()->create([
                'name' => $item['name'],
                'description' => $item['description'],
                'unit_price' => $item['price'],
                'menu_category_id' => 2,
            ]);
        }

        \App\Models\MenuCategory::factory()->create([
            'name' => 'Dinner',
            'description' => 'The things you like in the evening - only in the evening.  We\'re serious about this.',
        ]);

        // Loop through and create the dinner menu items
        foreach ($this->dinnerItems as $item) {
            \App\Models\MenuItem::factory()->create([
                'name' => $item['name'],
                'description' => $item['description'],
                'unit_price' => $item['price'],
                'menu_category_id' => 3,
            ]);
        }
    }
}
