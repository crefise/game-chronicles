<?php

namespace Tests\CustomTestsForRoadMap;

use App\Models\Game;
use Tests\TestCase;

class CreateGame extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = Game::create([
            'name'         => 'Test name',
            'key'          => 123,
            'release_date' => 111,
            'ext_id'       => 123,
            'import_id'    => 1,
        ]);

        $this->assertEquals(1, 1);
    }
}
