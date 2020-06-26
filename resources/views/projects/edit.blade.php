@extends('layouts')

@section('title', 'Crear Proyecto')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">

                @include('partials.validation-errors')

                <form
                    class="bg-white py-4 px-3 rounded shadow"
                    action="{{ route('projects.update', $project) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    >

                    @method('patch')
                    <h1>Editar proyecto</h1>
                    <hr>

                    @include('projects._form', ['btnText' => 'Actualizar'])

                </form>
            </div>
        </div>

    </div>

@endsection
