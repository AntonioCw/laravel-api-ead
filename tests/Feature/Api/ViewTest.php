<?php

namespace Tests\Feature\Api;

use App\Models\Lesson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    use UtilsTrait;

    public function test_make_view_unauthenticated()
    {
        $response = $this->postJson('/lessons/viewed');

        $response->assertStatus(401);
    }

    public function test_make_view_error_validator()
    {
        $payload = [];
        $response = $this->postJson('/lessons/viewed', $payload, $this->defaultHeaders());

        $response->assertStatus(422);
    }

    public function test_make_view_invalid_lesson()
    {
        $payload = [
            'lesson' => 'faker_lesson',
        ];
        $response = $this->postJson('/lessons/viewed', $payload, $this->defaultHeaders());

        $response->assertStatus(422);
    }

    public function test_make_view()
    {
        $lesson = Lesson::factory()->create();
        $payload = [
            'lesson' => $lesson->id,
        ];

        $response = $this->postJson('/lessons/viewed', $payload, $this->defaultHeaders());

        $response->assertStatus(200);
    }
}
