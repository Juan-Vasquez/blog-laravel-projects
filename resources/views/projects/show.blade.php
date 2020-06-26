@extends('layouts')

@section('title', 'Proyecto | '.$projects->title)

@section('content')

	<div class="container">

		<div class="row">
			<div class="col-12 col-sm-10 col-lg-8 mx-auto">

				@if($projects->image)
		            <img class="card-img-top" src="/storage/{{ $projects->image }}" alt="{{ $projects->title }}">
		        @endif

				<div class="bg-white p-4 rounded shadow">

					<h1>{{ $projects->title }}</h1>

					<p class="text-secundary">{{ $projects->description }}</p>
					<p class="text-black-50">{{ $projects->created_at->diffForHumans() }}</p>

					<div class="d-flex justify-content-between">
						<a href="{{ route('projects.index') }}">
							Regresar
						</a>
						@auth
							<div class="btn-group">

								<a class="btn btn-primary" href="{{ route('projects.edit', $projects) }}">Editar
								</a>
								<a class="btn btn-danger" href="#" onclick="document.getElementById('form-delete').submit()" >
									Eliminar
								</a>

							</div>

							<!-- Eliminar projecto -->
							<form class="d-none" id="form-delete" method="POST" action="{{ route('projects.destroy', $projects) }}">
								@csrf @method('DELETE')
							</form>
							<!-- ----------------- -->

						@endauth
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection