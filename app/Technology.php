<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    public function scopeMassCreate($query, $string)
    {
        $arr = explode(',', $string);

        $data = collect($arr)->map(function($item) {
            return [
                'title' => $item,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];
        })->toArray();

        return $query->insert($data);
    }

    /**
     * Get all of the teams for the skill.
     */
    public function teams()
    {
        return $this->morphedByMany('App\Team', 'skillable');
    }

    /**
     * Get all of the users for the technology.
     */
    public function users()
    {
        return $this->morphedByMany('App\User', 'technologyable');
    }
}
