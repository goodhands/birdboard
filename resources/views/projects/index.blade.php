@extends('layouts.app')
    @section('content')
        <header class="flex items-center mb-3 py-4">
            <div class="flex justify-between w-full items-end">
                <h3 class="text-grey no-underline text-lg font-normal">My projects</h3>
                <a href="/projects/create" class="button bg-blue p-3 text-white no-underline rounded-lg text-sm py-2 px-5">New project</a>
            </div>
        </header>

        <main class="lg:flex sm:my-5 flex-wrap -mx-3">
            @forelse ($projects as $project)
                <div class="lg:w-1/3 px-3 pb-6">
                    @include('projects.cards')
                </div>
            @empty
               <div>No project yet</div>
            @endforelse
            </main>
    @endsection