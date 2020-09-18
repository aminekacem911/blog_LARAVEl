<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::create(['category'=>'job']);
        Category::create(['category'=>'meeting']);
        Category::create(['category'=>'collocation']);
        Category::create(['category'=>'trade']);
        Category::create(['category'=>'gaming']);
    }
}
