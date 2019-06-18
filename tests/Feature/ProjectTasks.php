<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTasks extends TestCase
{
    use RefreshDatabase;

    /** @test */

     public function a_project_can_have_tasks(){

        $this->withoutExceptionHandling();

        $this->authenticate();

        $project = factory('App\Projects')->create(['owner_id' => auth()->id()]);
        
        $this->post($project->path() . '/tasks', ['body' => 'A new task']);

        $this->get($project->path())
            ->assertSee('A new task');

    }
}
