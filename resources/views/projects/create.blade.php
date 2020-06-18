@extends('layouts')

@section('title', 'Crear Proyecto')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

            @include('partials.validation-errors')

            <form class="bg-white py-4 px-3 shadow rouded" action="{{ route('projects.store') }}" method="POST">
                @csrf
                <h1>Crear nuevo proyecto</h1>
                <hr>

                @include('projects._form', ['btnText' => 'Crear'])

            </form>
        </div>
    </div>
</div>

@endsection
