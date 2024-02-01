<?php

namespace Src\Domain\Client\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Client\Entities\Client;

class ClientTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Client::factory(1000)->times(50);
    }
}
