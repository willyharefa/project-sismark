<?php

namespace Tests\Unit;

// use App\Helpers\AbbreviateNumber\AbbNumber;
use PHPUnit\Framework\TestCase;
use App\Helpers\AbbreviateNumber as AbbreviateNumber;

class AbbreviateNumberTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_abbreviate_number(): void
    {
        $data = AbbreviateNumber::abbreviate(20000);
        echo $data;

        // echo $abbreviatedNumber;
    }
}
