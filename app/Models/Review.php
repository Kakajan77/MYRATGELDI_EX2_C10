<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Review extends Model
{

    use HasFactory, Notifiable;
    protected $guarded = [
        'id'
    ];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function reviewer()
    {
        return $this->morphTo();
    }

    public function reviewee()
    {
        return $this->morphTo();
    }

}
