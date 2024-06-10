@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Aggiungi Tecnologia al Sistema</h2>
    <form action="{{route('admin.tecnologies.store', $tecnologies)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label">Add Tecnology:</label>
            <input type="text" min="0" max="999" step="1" name="type" class="form-control" id="type"
                placeholder="inserisci tecnologia...">
        </div>
        <div class="mt-5">
            <button class="btn btn-primary">Aggungi</button>
        </div>



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