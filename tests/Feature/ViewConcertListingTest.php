<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewConcertListingTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function user_can_view_a_published_concert_listing()
    {
        $this->withoutExceptionHandling();
        //Arrange
        //Create a Concert

        $concert = Concert::factory()->published()->create([
            'title' => 'The Red Chord',
            'subtitle' => 'with Anomosity and Lethargy',
            'date' => Carbon::parse('December 14, 2022 8:00pm'),
            'ticket_price' => 3250,
            'venue' => 'The Mosh Pit',
            'venue_address' => '123 Example Lane',
            'city' => 'Laraville',
            'state' => 'ON',
            'zip' => '17194',
            'additional_information' => 'For tickets contact (555) 555-5555',
        ]);

        //Act
        //View the concert listing

        $response = $this->get('/concerts/'.$concert->id);

        //Assert
        //See the concert details

        $response->assertSee('The Red Chord');
        $response->assertSee('with Anomosity and Lethargy');
        $response->assertSee('December 14, 2022');
        $response->assertSee('8:00pm');
        $response->assertSee('32.50');
        $response->assertSee('The Mosh Pit');
        $response->assertSee('123 Example Lane');
        $response->assertSee('Laraville, ON 17194');
        $response->assertSee('For tickets contact (555) 555-5555');
    }

    /** @test */
    function user_cannot_view_unpublished_concert_listings(){

        $concert = Concert::factory()->unpublished()->create();

        $response = $this->get('/concerts/'.$concert->id);

        $response->assertStatus(404);
    }

}
