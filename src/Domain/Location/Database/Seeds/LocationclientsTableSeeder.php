<?php

namespace Src\Domain\Location\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Location\Entities\Locationclients;

class LocationclientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Locationclients::factory(1000)->times(50);
    }
}
