<?php

if (! function_exists('array_similarity')) {
    function array_similarity(array $required, array $provided)
    {
        $size = count($required);

        for ($i=0, $j=0; $i < $size; $i++) {
            in_array($required[$i], $provided) ? $j++ : $j;
        }

        return floor(($j/$size)*100);
    }
}
