<?php
namespace App\Filters\Filters;


interface Filter
{
    public static function apply($query, $ids);
}
