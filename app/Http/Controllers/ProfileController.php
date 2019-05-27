<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $activities = $this->getActivity($user);

        // return $activities;

        return view('profiles.show', [
            'profileUser' => $user,
            'activities' => $activities
        ]);
    }

    public function getActivity(User $user)
    {
        return $user->activity()->latest()->with('subject')->take(50)->get()->groupBy(function ($activity) {
            return $activity->created_at->format('Y-m-d');
        });
    }
}
