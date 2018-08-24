<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$tags = [
			['label' => 'apple'],
			['label' => 'apricots'],
			['label' => 'avocado'],
			['label' => 'banana'],
			['label' => 'blackcurrant'],
			['label' => 'blueberries'],
			['label' => 'breadfruit'],
			['label' => 'cantaloupe'],
			['label' => 'carambola'],
			['label' => 'cherimoya'],
			['label' => 'cherries'],
			['label' => 'clementine'],
			['label' => 'cranberries'],
			['label' => 'durian'],
			['label' => 'elderberries'],
			['label' => 'feijoa'],
			['label' => 'figs'],
			['label' => 'gooseberries'],
			['label' => 'grapefruit'],
			['label' => 'grapes'],
			['label' => 'guava'],
			['label' => 'melon'],
			['label' => 'jackfruit'],
			['label' => 'kiwifruit'],
			['label' => 'kumquat'],
			['label' => 'lemon'],
			['label' => 'lime'],
			['label' => 'longan'],
			['label' => 'loquat'],
			['label' => 'lychee'],
			['label' => 'mandarin'],
			['label' => 'mango'],
			['label' => 'mangosteen'],
			['label' => 'mulberries'],
			['label' => 'nectarine'],
			['label' => 'olives'],
			['label' => 'orange'],
			['label' => 'papaya'],
			['label' => 'peaches'],
			['label' => 'pear'],
			['label' => 'pineapple'],
			['label' => 'pitanga'],
			['label' => 'plantain'],
			['label' => 'pomegranate'],
			['label' => 'prunes'],
			['label' => 'pummelo'],
			['label' => 'raspberries'],
			['label' => 'rhubarb'],
			['label' => 'sapodilla'],
			['label' => 'soursop'],
			['label' => 'strawberries'],
			['label' => 'tamarind'],
			['label' => 'tangerine'],
			['label' => 'watermelon'],
		];
		
        App\Tag::insert($tags);
    }
}
