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


    /**
     * Store a new favorite in the database
     * 
     * @param Reply $reply
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Reply $reply)
    {
        $reply->favorite();

        return back();
    }
}
