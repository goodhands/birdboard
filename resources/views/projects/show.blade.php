@extends('layouts.app')
@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between w-full items-end">
            <p class="text-grey no-underline">
                <a href="/projects" class="no-underline text-grey">My projects</a> / {{ $project->title }}
            </p>
            <a href="/projects/create" class="button bg-blue p-3 text-white no-underline rounded-lg text-sm py-2 px-5">New project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">

            <div class="lg:w-3/4 px-3">
                <div class="mb-8">
                    <h3 class="text-grey mb-3 no-underline text-lg font-normal">Tasks</h3>
                    {{-- tasks list --}}
                    <div class="card mb-3">Lorem ipsum</div>
                    <div class="card mb-3">Lorem ipsum</div>
                    <div class="card mb-3">Lorem ipsum</div>
                    <div class="card mb-3">Lorem ipsum</div>
                </div>
              

                <div>
                    <h3 class="text-grey mb-3 no-underline text-lg font-normal">General Notes</h3>
                    <textarea class="card w-full no-resize" style="min-height:200px">
                        Lorem ipsum
                    </textarea>
                </div>

            </div>

            <div class="lg:w-1/4 px-3">
                    @include('projects.cards')
            </div>

        </div>
    </main>
    <a href="/projects"> << Go back</a>
@endsection