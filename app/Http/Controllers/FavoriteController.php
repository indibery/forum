<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * FavoritesController Comstructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Reply $reply)
    {
        return $reply->favorite();
    }
}
