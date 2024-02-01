<?php

namespace Src\Domain\Vendor\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Vendor\Entities\Vendor;

class VendorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Vendor::factory(1000)->times(50);
    }
}
