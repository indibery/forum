<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_favorite_anything()
    {
        $this->post('replies/1/favorites')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_favorite_any_reply()
    {

        $this->signIn();

        // /replies/id/favorites
        $reply = create('App\Reply');

        // If I post to a "favorite" endpoint
        $this->post('replies/' . $reply->id . '/favorites');

        //dd(\App\favorite::all());
        // It should be recorded in the database.
        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function an_authenticated_user_may_only_favorite_a_reply_once()
    {
        $this->signIn();

        $reply = create('App\Reply');

        try {
            $this->post('replies/' . $reply->id . '/favorites');
            $this->post('replies/' . $reply->id . '/favorites');
        } catch (\Exception $e) {
            $this->fail('Did not expect to insert the same record set twice.');
        }

        //dd(\App\favorite::all()->toArray());

        $this->assertCount(1, $reply->favorites);
    }
}
