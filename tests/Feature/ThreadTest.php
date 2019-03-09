<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_browse_all_threads()
    {
        $thread = factory('App\Thread')->create();
        
        $response = $this->get('/threads');

        $response->assertSee($thread->title);

    }

    /** @test */
    public function a_user_can_browse_a_single_thread()
    {
        $thread = factory('App\Thread')->create(); //이게 뭐냥

        $response = $this->get('/threads/' . $thread->id);
        
        $response->assertSee($thread->title);
    }
    
}
