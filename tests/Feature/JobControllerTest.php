<?php

namespace Tests\Feature;

use App\Models\Job;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected Employer $employer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->employer = Employer::factory()->create(['user_id' => $this->user->id]);
    }

    /** @test */
    public function testguests_can_view_all_job_listings(): void
    {
        $jobs = Job::factory()->count(2)->create();

        $response = $this->get('/jobs');

        $response->assertOk()
                 ->assertViewIs('jobs.index')
                 ->assertViewHas('jobs');

        // Assert actual data visible
        foreach ($jobs as $job) {
            $response->assertSee($job->title)
                     ->assertSee((string)$job->salary)
                     ->assertSee($job->employer->name);
        }
    }

    /** @test */
    public function testguests_can_view_a_single_job_listing(): void
    {
        $job = Job::factory()->create();

        $response = $this->get("/jobs/{$job->id}");

        $response->assertOk()
                 ->assertViewIs('jobs.show')
                 ->assertViewHas('job', $job)
                 ->assertSee($job->title)
                 ->assertSee((string)$job->salary);
    }

    /** @test */
    public function testa_job_can_be_created_with_valid_data(): void
    {
        $this->actingAs($this->user);

        $response = $this->post('/jobs', [
            'title' => 'New Test Job',
            'salary' => '75000',
            'description' => 'A valid description',
            'location' => 'Lahore',
            'employment_type' => 'full-time',
        ]);

        $response->assertStatus(302)
                 ->assertRedirect('/jobs');

        $this->assertDatabaseHas('job_listings', [
            'Title' => 'New Test Job',
            'Salary' => '75000',
        ]);
    }

    /** @test */
    public function testjob_creation_fails_with_invalid_data(): void
    {
        $this->actingAs($this->user);

        $response = $this->post('/jobs', [
            'title' => 'T', // too short
            'salary' => '', // missing
        ]);

        $response->assertSessionHasErrors(['title', 'salary']);
        $this->assertDatabaseCount('job_listings', 0);
    }

    /** @test */
    public function testan_authenticated_user_can_delete_their_own_job(): void
    {
        $jobToDelete = Job::factory()->create(['employer_id' => $this->employer->id]);

        $response = $this->actingAs($this->user)
                         ->delete("/jobs/{$jobToDelete->id}");

        $response->assertRedirect('/jobs')
                 ->assertSessionHas('success', 'Job deleted successfully.');

        $this->assertDatabaseMissing('job_listings', ['id' => $jobToDelete->id]);
    }

    /** @test */
    public function testan_authenticated_user_can_update_their_own_job(): void
    {
        $jobToEdit = Job::factory()->create([
            'employer_id' => $this->employer->id
        ]);

        $response = $this->actingAs($this->user)->patch("/jobs/{$jobToEdit->id}", [
            'title' => 'Updated Job Title',
            'salary' => '150000',
            'description' => 'New Description',
            'location' => 'Remote',
            'employment_type' => 'full-time',
        ]);

        $response->assertRedirect("/jobs/{$jobToEdit->id}")
                 ->assertSessionHas('success', 'Job updated successfully.');

        $this->assertDatabaseHas('job_listings', [
            'id' => $jobToEdit->id,
            'Title' => 'Updated Job Title',
            'Salary' => '150000',
            'location' => 'Remote',
            'description' => 'New Description',
            'employment_type' => 'full-time',
        ]);
    }

    /** @test */
    public function testa_different_user_cannot_update_another_users_job(): void
    {
        $jobToEdit = Job::factory()->create();
        $otherUser = User::factory()->create();

        $response = $this->actingAs($otherUser)->patch("/jobs/{$jobToEdit->id}", [
            'Title' => 'Hacked Title',
            'Salary' => '9999999',
        ]);

        $response->assertStatus(403);

        $this->assertDatabaseMissing('job_listings', [
            'id' => $jobToEdit->id,
            'Title' => 'Hacked Title',
        ]);
    }
}
