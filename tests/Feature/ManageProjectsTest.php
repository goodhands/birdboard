<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

     /** @test */
     public function guests_may_not_create_project(){

        // $this->withoutExceptionHandling();

        $attributes = factory("App\Projects")->raw();

        $this->post('/projects', $attributes)->assertRedirect('login');
        $this->get('/projects/create')->assertRedirect('login');
    }

    /** @test */
    public function guests_may_not_view_projects(){

        $this->get('/projects')->assertRedirect('login');
    
    }
    
    /** @test */
    public function guests_may_not_view_single_projects(){

        $project = factory("App\Projects")->create();

        $this->get($project->path())->assertRedirect('login');
    
    }

    /** @test */
    public function a_user_can_create_a_project(){

        $this->authenticate();

        // $this->withoutExceptionHandling();
        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence(),    
            'description' => $this->faker->paragraph(),
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    /** @test */
    public function a_project_requires_a_title(){

        $this->authenticate();

        $attributes = factory("App\Projects")->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    } 

    /** @test */
    public function a_project_requires_a_description(){

        $this->authenticate();

        $attributes = factory("App\Projects")->raw(['description' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_user_can_view_their_project(){

        $this->be(factory('App\User')->create());

        $this->withoutExceptionHandling();

        $project = factory("App\Projects")
                    ->create(['owner_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description); 
    }

    /** @test */
    public function a_logged_user_cannot_view_others_projects(){

        $this->be(factory('App\User')->create());

        // $this->withoutExceptionHandling();

        $project = factory("App\Projects")->create();

        $this->get($project->path())->assertStatus(403);
    }

}
