@extends('layouts.admin')
@section('title', 'Projects')


@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>Projects</h1>
        <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Crea nuovo project</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->slug}}</td>
                    <td>{{$project->created_at}}</td>
                    <td>{{$project->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.projects.edit', $project->slug)}}"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button border-0 bg-transparent"
                                data-item-title="{{ $project->title }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</section>
@endsection