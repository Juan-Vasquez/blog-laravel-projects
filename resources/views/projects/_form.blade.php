@csrf

@if($project->image)
    <img class="card-img-top mb-3"
        style="height: 250px; object-fit: cover"
        src="/storage/{{ $project->image }}"
        alt="{{ $project->title }}">
@endif

<div class="custom-file mb-3">
    <input
        name="image"
        type="file"
        class="custom-file-input"
        id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
</div>

<div class="form-group">
    <label for="category_id">Categoria del Proyecto</label>
    <select name="category_id" id="category_id" class="form-control border-0 bg-light shadow-sm">
        <option value="">Categorias...</option>
        @foreach($categories as $id => $name)
        <option value="{{$id}}" @if($id== old('category_id', $project->category_id)) selected @endif>{{$name}}</option>
        @endforeach
    </select>
</div>

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