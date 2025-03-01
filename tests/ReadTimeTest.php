<?php

namespace Vdhicts\ReadTime\Tests;

use joshtronic\LoremIpsum;
use Vdhicts\ReadTime\ReadTime;

class ReadTimeTest extends TestCase
{
    private LoremIpsum $loremIpsum;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->loremIpsum = new LoremIpsum();
    }

    public function test_read_time_with_default_words_per_minute()
    {
        $readTime = new ReadTime($this->loremIpsum->words(400));

        $this->assertSame(2, $readTime->minutes());
        $this->assertSame(120, $readTime->seconds());
        $this->assertSame(400, $readTime->wordCount());
    }

    public function test_read_time_with_custom_words_per_minute()
    {
        $readTime = new ReadTime($this->loremIpsum->words(400), 100);

        $this->assertSame(4, $readTime->minutes());
        $this->assertSame(240, $readTime->seconds());
        $this->assertSame(400, $readTime->wordCount());
    }

    public function test_helper_with_default_words_per_minute()
    {
        $readTime = read_time($this->loremIpsum->words(400));

        $this->assertSame(2, $readTime);
    }

    public function test_helper_with_custom_words_per_minute()
    {
        $readTime = read_time($this->loremIpsum->words(400), 100);

        $this->assertSame(4, $readTime);
    }
}
