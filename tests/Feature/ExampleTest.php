<?php

namespace Tests\Feature;


use Tests\TestCase;
use Spatie\Analytics\Period;
use Spatie\Analytics\AnalyticsFacade;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        // $data =  AnalyticsFacade::fetchVisitorsAndPageViews(Period::days(7));

        // dd($data);

        $response->assertStatus(200);
    }
}
