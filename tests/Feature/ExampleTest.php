<?php

namespace Tests\Feature;

use App\Models\Feature;
use App\Models\Release;
use App\Services\ReleaseService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    private ReleaseService $releaseService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->releaseService = new ReleaseService();
    }

    public function test_it_creates_a_release(): void
    {
        $data = [
            'title' => 'Release 1.0',
            'description' => 'Description of Release 1.0',
            'content' => 'Detailed content of the release.',
            'version' => '1.0',
            'release_date' => now()->toDateString(),
            'media' => null,
            'link' => null,
        ];

        $release = $this->releaseService->createRelease($data);

        $this->assertDatabaseHas('releases', ['title' => 'Release 1.0']);
        $this->assertEquals($data['title'], $release->title);
    }

    public function test_it_finds_a_release_by_id(): void
    {
        $release = Release::factory()->create();

        $foundRelease = $this->releaseService->getReleaseById($release->id);

        $this->assertEquals($release->id, $foundRelease->id);
        $this->assertEquals($release->title, $foundRelease->title);
    }

    public function test_it_updates_a_release(): void
    {
        $release = Release::factory()->create();

        $data = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ];

        $updatedRelease = $this->releaseService->updateRelease($release->id, $data);

        $this->assertEquals($data['title'], $updatedRelease->title);
        $this->assertEquals($data['description'], $updatedRelease->description);
    }

    public function test_it_deletes_a_release(): void
    {
        $release = Release::factory()->create();

        $this->releaseService->deleteRelease($release->id);

        $this->assertSoftDeleted('releases', ['id' => $release->id]);
    }

    public function test_release_can_have_features(): void
    {
        $release = Release::factory()->create();
        $feature = Feature::factory()->create();

        $release->features()->attach($feature);

        $this->assertTrue($release->features->contains($feature));
    }
}
