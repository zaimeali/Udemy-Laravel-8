<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->get('/'); // Act

        $response->assertStatus(200); // Assert
        $response->assertSeeText('Home Page');
        // $response->assertSeeText('Welcome to Laravel!');
    }

    public function testContactPageIsWorkingCorrectly()
    {
        $response = $this->get('/contact');
        $response->assertSeeText('Contact Page');
    }
}
