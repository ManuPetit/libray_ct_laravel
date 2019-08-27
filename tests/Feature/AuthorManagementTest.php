<?php

namespace Tests\Feature;

use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post('/authors', [
            'name' => 'Author Name',
            'dob' => '05/14/1995',
        ]);

        $author = Author::all();

        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('1995/14/05', $author->first()->dob->format('Y/d/m'));
    }
}
