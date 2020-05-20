<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFeedbackPost()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/feedback', 
            [
                'firstname' => 'Вася', 
                'message' => 'Тестирование'
            ]
        );

        $response->assertSessionHasNoErrors();
    }
}
