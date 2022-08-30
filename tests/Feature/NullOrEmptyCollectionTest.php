<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NullOrEmptyCollectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = collect([1]);
        $this->assertFalse($this->isNullOrEmpty($data));
    }


    private function isNullOrEmpty(mixed $collection) : bool
    {
        return (is_null($collection) ||  (count($collection) < 1 ) );
    }
}
