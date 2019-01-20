<?php
namespace App\Filters\Filters;

class Skill implements Filter
{
    public static function apply($query, $ids)
    {
        return $query->orWhereHas('skills', function ($q) use ($ids) {
            return $q->whereIn('skills.id', $ids);
        });
    }
}
