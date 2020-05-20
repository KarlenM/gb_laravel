<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMain()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testAbout()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function testDownloadOrder()
    {
        // $this->withoutExceptionHandling();
        $response = $this->get('/download-order');
        $response->assertStatus(200);
    }

    public function testFeedback()
    {
        $response = $this->get('/feedback');
        $response->assertStatus(200);
    }

    public function testNews()
    {
        // $this->withoutExceptionHandling();
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function testCategories()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/news/categories');
        $response->assertStatus(200);
    }

    public function testCategory()
    {
        $response = $this->get('/news/politics');
        $response->assertStatus(200);
    }

    public function testNewsPage()
    {
        $response = $this->get('/news/politics/1');
        $response->assertStatus(200);
    }
}
