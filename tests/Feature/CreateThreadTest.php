<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_can_create_new_forum_thread()
    {
        $this->withoutExceptionHandling();

        // $this->actingAs(factory('App\User')->create());
        $this->signIn();

        // $thread = factory('App\Thread')->make();
        $thread = create('App\Thread');

        $this->post('/threads', $thread->toArray());
        $this->get($thread->path())->assertSee($thread->title)->assertSee($thread->body);
    }

    /** @test */
    public function guests_may_not_create_threads()
    {
        $this->get('/threads/create')->assertRedirect('/login');
        $this->post('/threads')->assertRedirect('/login');
    }

}