<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    use RefreshDatabase; 
    
    public function a_user_can_browse_threads() 
    {
        $response = $this->get('/threads'); 

        $response-assertStatus(200); 
    }
}