@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.projects.store') }}" method="POST">

        {{-- Cross Site Request Forgering --}}
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="inserisci il title"
                value="{{old('title')}}">
        </div>



        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" min="0" max="999" step="1" name="description" class="form-control" id="description"
                placeholder="inserisci descrizione">
        </div>


        <div class="mb-3">
            <select name="type_id" id="type_id">
                <option value="">Seleziona Tipo Di Progetto</option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id')) value="{{$type->id}}">{{$type->slug}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <div>Seleziona Tecnologia:</div>
            <div class="d-flex gap-3 mt-3 mb-3">
                @foreach ($tecnologys as $tecnology)
                    <input @checked(in_array($tecnology->id, old('tecnologys', []))) name="tecnologys[]"
                        class="form-check-input" type="checkbox" value="{{ $tecnology->id}}" id="tag-{{$tecnology->id}}">
                    <label class="form-check-label" for="tag-{{$tecnology->id}}">
                        {{ $tecnology->tecnology }}
                    </label>
                @endforeach
            </div>

        </div>

        <button class="btn btn-primary">Crea</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger mt-5 col">
            <ul>
                @foreach ($errors->all() as $error)

                    <li>
                        {{$error}}
                    </li>

                @endforeach
            </ul>
        </div>
    @endif
</div>

@endsection