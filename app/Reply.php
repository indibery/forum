<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable, RecordsActivity;
    protected $guarded = [];

    protected $with = ['owner', 'favorites'];

    /**
     * A reply has an owner.
     *
     * @regurn \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
