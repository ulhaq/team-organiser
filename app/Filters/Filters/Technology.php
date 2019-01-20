<?php
namespace App\Filters\Filters;


class Technology implements Filter
{
    public static function apply($query, $ids) {
        return $query->orWhereHas('technologies', function($q) use ($ids){
            return $q->whereIn('technologies.id', $ids);
        });
    }
}
