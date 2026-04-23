<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Attendee extends Model
{
    protected $fillable = [
        'user_id',
        'event_id'
    ];
    public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
