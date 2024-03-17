<?php

use Vdhicts\ReadTime\ReadTime;

if (! function_exists('read_time')) {
    function read_time(string $content, ?int $wordsPerMinute = null): int
    {
        return (new ReadTime($content, $wordsPerMinute))->minutes();
    }
}
