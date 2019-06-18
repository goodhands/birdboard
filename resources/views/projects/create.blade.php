@extends('layouts.app')

@section('content')
    <h1>Create a project</h1>

   <form action="/projects" method="POST">
        @csrf
        <div class="field">
            <label for="title" class="label">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title">
            </div>
       </div>

       <div class="field">
            <label for="title" class="label">Description</label>

            <div class="control">
                <textarea class="textarea" name="description" placeholder="Description"></textarea>
            </div>
       </div>

       <div class="field">
           <button class="button" type="submit">Submit</button>
           <a href="/projects">Cancel</a>
       </div>
   </form>
@endsection