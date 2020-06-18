@csrf

<div class="form-group">
	<label for="title">Titulo</label>
    <input
    	class="form-control border-0 bg-light shadow-sm"
    	type="text"
    	name="title"
    	value="{{ old('title', $project->title) }}"
    >
</div>

<div class="form-group">
	<label for="url">URL del proyecto</label>
    <input
    	class="form-control border-0  bg-light shadow-sm"
    	type="text"
    	name="url"
    	value="{{ old('url', $project->url) }}"
    >
</div>

<div class="form-group">
	<label for="description">Descripcion</label>
    <textarea
    	class="form-control border-0 bg-light shadow-sm"
    	name="description"
    	id="description">{{ old('description', $project->description) }}
    </textarea>
</div>

<div class="form-group">
	<button
		class="btn btn-primary btn-block"
		type="submit">{{ $btnText }}
	</button>
    <a class="btn btn-link btn-block" href="{{ route('projects.index') }}">
        Cancelar
    </a>
</div>