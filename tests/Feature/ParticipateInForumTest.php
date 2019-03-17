<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->withoutExceptionHandling();

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = factory('App\Thread')->create();
        $this->post('/threads/1/replies', []);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->withoutExceptionHandling();

        $user = factory('App\User')->create();
        $this->be($user);

        $thread = factory('App\Thread')->create();

        $reply = factory('App\Reply')->make();
        $this->post('/threads/' . $thread->id . '/replies', $reply->toArray());

        $this->get($thread->path())->assertSee($reply->body);

    }
}
