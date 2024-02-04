<?php

namespace Src\Domain\Location\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Location\Entities\Location;

class LocationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Location::factory(1000)->times(50);
    }
}
