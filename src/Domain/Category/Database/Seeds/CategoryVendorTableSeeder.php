<?php

namespace Src\Domain\Category\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Category\Entities\CategoryVendor;

class CategoryVendorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        CategoryVendor::factory(1000)->times(50);
    }
}
