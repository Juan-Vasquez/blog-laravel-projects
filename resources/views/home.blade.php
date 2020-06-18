@extends('layouts')

@section('title', 'Home')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-12 col-lg-6">

		    <h1 class="display-4 text-primary">Desarrollo Web</h1>
			<p class="lead text-secundary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis quasi rem doloribus, minus quo, exercitationem aut assumenda non beatae ex! Ad deserunt ipsam, minima mollitia eos amet eaque, doloremque magni.</p>
			<a class="btn btn-primary btn-block" href="{{ route('about') }}">
				Contactame
			</a>
			<a class="btn btn-outline-primary btn-block" href="{{ route('projects.index') }}">
				Portafolio
			</a>

		</div>
		<div class="col-12 col-lg-6">
			<img class="img-fluid mb-4" src="/img/home.svg" alt="Desarrollo Web">
		</div>
	</div>

</div>

@endsection