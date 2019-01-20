<?php

namespace App;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Filterable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'joined_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'img', 'joined_at',
    ];

    /**
     * Get all ids of the teams for the user.
     */
    public function getTeamIdsAttribute()
    {
        return $this->teams->pluck('id')->toArray();
    }

    /**
     * Get all ids of the skills for the user.
     */
    public function getSkillIdsAttribute()
    {
        return $this->skills->pluck('id')->toArray();
    }

    /**
     * Get all ids of the technologies for the user.
     */
    public function getTechnologyIdsAttribute()
    {
        return $this->technologies->pluck('id')->toArray();
    }

    /**
     * Get all of the skills for the user.
     */
    public function skills()
    {
        return $this->morphToMany('App\Skill', 'skillable')->withTimeStamps();
    }

    /**
     * Get all of the technologies for the user.
     */
    public function technologies()
    {
        return $this->morphToMany('App\Technology', 'technologyable')->withTimeStamps();
    }

    /**
     * The teams that belong to the user.
     */
    public function teams()
    {
        return $this->belongsToMany('App\Team')->withTimeStamps();
    }
}
