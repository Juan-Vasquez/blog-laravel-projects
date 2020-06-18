@extends('layouts')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">

                {{-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}
                @include('partials.message-partials')

                <form class="bg-white shadow rounded p-3" method="POST" action="{{ route('message.store') }}">
                    <h1 class="display-4">{{__("Contact")}}</h1>
                    <hr>
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control border-0 bg-light shadow-sm {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            id="name"
                            type="text"
                            name="name"
                            placeholder="Nombre..."
                            value="{{ old('name') }}"
                        >
                        @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{-- {!! $errors->first('name', '<small>:message</small><br>') !!} --}}

                    <div class="form-group">
                        <label for="email">Correo electronico</label>
                        <input class="form-control border-0 bg-light shadow-sm {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            id="email"
                            type="email"
                            name="email"
                            placeholder="Email..."
                            value="{{ old('email') }}"
                        >
                        @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="subject">Asunto</label>
                        <input class="form-control border-0 bg-light shadow-sm {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                            id="subject"
                            type="text"
                            name="subject"
                            placeholder="Asunto..."
                            value="{{ old('subject') }}"
                        >
                        @if($errors->has('subject'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="content">Mensaje</label>
                        <textarea class="form-control border-0 bg-light shadow-sm {{ $errors->has('content') ? 'is-invalid' : '' }}"
                            id="content"
                            name="content"
                            placeholder="mensaje...">{{ old('content') }}
                        </textarea>
                        @if($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Send')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection