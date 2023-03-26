<?php

namespace Vdhicts\ReadTime;

use Illuminate\Support\Facades\Config;

class ReadTime
{
    private int $wordsPerMinute;

    private string $content;

    public function __construct(string $content, int $wordsPerMinute = null)
    {
        $this->wordsPerMinute = $wordsPerMinute ?? Config::get('read-time.words_per_minute');
        $this->content = strip_tags($content);
    }

    public function wordCount(): int
    {
        return str_word_count($this->content);
    }

    public function minutes(): int
    {
        return (int) ceil($this->wordCount() / $this->wordsPerMinute);
    }

    public function seconds(): int
    {
        $wordsPerSecond = $this->wordsPerMinute / 60;

        return (int) ceil($this->wordCount() / $wordsPerSecond);
    }
}
