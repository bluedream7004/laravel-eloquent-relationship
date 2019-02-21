<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use \Ankurk91\Eloquent\BelongsToOne;
    use Traits\HasImages;

    protected $guarded = ['id'];

    /**
     * @return \Ankurk91\Eloquent\Relations\BelongsToOne
     */
    public function operator()
    {
        return $this->belongsToOne(User::class)
            ->withPivot('is_operator')
            ->wherePivot('is_operator', 1)
            ->withTimestamps();
    }

    /**
     * @return \Ankurk91\Eloquent\Relations\BelongsToOne
     */
    public function operatorWithDefault()
    {
        return $this->belongsToOne(User::class)
            ->withPivot('is_operator')
            ->wherePivot('is_operator', 1)
            ->withTimestamps()
            ->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('is_operator')
            ->withTimestamps();
    }
}
