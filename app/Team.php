<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get all ids of the users for the team.
     */
    public function getUserIdsAttribute()
    {
      return $this->users->pluck('id')->toArray();
    }

    /**
     * Get all ids of the skills for the team.
     */
    public function getSkillIdsAttribute()
    {
      return $this->skills->pluck('id')->toArray();
    }

    /**
     * Get all ids of the technologies for the team.
     */
    public function getTechnologyIdsAttribute()
    {
      return $this->technologies->pluck('id')->toArray();
    }

    /**
     * Get all of the skills for the team.
     */
    public function skills()
    {
        return $this->morphToMany('App\Skill', 'skillable')->withTimeStamps();
    }

    /**
     * Get all of the technologies for the team.
     */
    public function technologies()
    {
        return $this->morphToMany('App\Technology', 'technologyable')->withTimeStamps();
    }

    /**
     * The users that belong to the team.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimeStamps();
    }
}
