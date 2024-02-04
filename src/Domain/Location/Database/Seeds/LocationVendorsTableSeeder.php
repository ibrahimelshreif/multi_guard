<?php

namespace Src\Domain\Location\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Location\Entities\LocationVendors;

class LocationVendorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        LocationVendors::factory(1000)->times(50);
    }
}
