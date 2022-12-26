<?php

namespace Tests\Feature;

use Tests\TestCase;

class TestemunhosTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_testemunhos()
    {
        $response = $this->get('/testemunhos');

        $response->assertStatus(200);
    }
}
