@extends('layouts')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            @isset($category)
                <div>
                    <h1 class="display-4 mb-0">{{$category->name}}</h1>
                    <a href="{{ route('projects.index') }}">Regresar a proyectos</a>
                </div>
            @else
                <h1 class="display-4 mb-0">Portfolio</h1>
            @endisset

            <!-- Crear Proyectos -->
            @auth
                <a class="btn btn-primary" href="{{ route('projects.create') }}">Crear proyect</a>
            @endauth
            <!-- ----------------- -->
        </div>

        <p class="lead text-secondary">Proyectos realizados, a fines de mostrar mis habilidades y puedan conocerme por lo que puedo hacer con las diferentes tecnologias de back-end.</p>

        <div class="d-flex flex-wrap justify-content-between align-items-start">
            @forelse ($projects as $project)
                <div class="card border-0 mb-3 shadow-sm mt-4 mx-auto" style="width: 18rem">

                    @if($project->image)
                        <img class="card-img-top"
                            style="height: 150px; object-fit: cover;"
                            src="/storage/{{ $project->image }}"
                            alt="{{ $project->title }}">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('projects.show', $project) }}">
                                {{ $project->title }}
                            </a>
                        </h5>
                        <h6 class="card-subtitle">
                            {{ $project->created_at->format('d/m/y') }}
                        </h6>
                        <p class="card-text text-truncate">{{ $project->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary btn-sm">Ver mas...</a>
                            @if($project->category_id)
                                <a href="{{ route('categories.show', $project->category) }}" class="badge badge-secondary">{{$project->category->name}}</a>
                            @endif
                        </div>
                    </div>

                </div>
            @empty
                <li class="list-group-item border-0 mb-3 shadow-sm">No hay proyectos</li>
            @endforelse
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        </div>

    </div>

@endsection
