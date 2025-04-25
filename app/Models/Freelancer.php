<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Freelancer extends Model
{

    use HasFactory, Notifiable;
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function writtenReviews()
    {
        return $this->morphMany(Review::class, 'reviewer');
    }

    public function receivedReviews()
    {
        return $this->morphMany(Review::class, 'reviewee');
    }

}
