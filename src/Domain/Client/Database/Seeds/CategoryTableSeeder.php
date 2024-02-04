<?php

namespace Src\Domain\Client\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Client\Entities\Category;

class CategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Category::factory(1000)->times(50);
    }
}
