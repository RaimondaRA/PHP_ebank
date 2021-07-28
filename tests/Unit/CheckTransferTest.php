<?php

namespace Tests\Unit;

use Tests\TestCase;

class CheckTransferTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_transfer()
    {
        $response = $this->get('/transfer');
        $response->assertStatus(200);
    }
}
