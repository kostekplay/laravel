<?php

namespace Tests\Feature;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_HomePageIsWorkingCorrectly()
    {
        $response = $this->get('/');
        $response->assertSeeText('Home Page');
    }

    public function test_ContactPageIsWorkingCorrectly()
    {
        $response = $this->get('/contact');
        $response->assertSeeText('Contact Page');
    }
}
