<?php
namespace App\Filters;

trait Filterable
{
    public function scopeFilter($query, $filters)
    {
        foreach ($filters as $filter => $ids) {
            $class = $this->getFilterPath($filter);

            if ($this->isFilter($class)) {
                $class::apply($query, $ids);
            }
        }
        
        return $query;
    }

    private function getFilterPath($filterName)
    {
        return __NAMESPACE__ . "\\Filters\\" . studly_case($filterName);
    }

    private function isFilter($class)
    {
        return class_exists($class);
    }
}
