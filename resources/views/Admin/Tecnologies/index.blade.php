@extends('layouts.app')

@section('content')
<div class="container-sm py-4">
    <div class="card" style="">
        <div class="d-flex justify-content-between align-items-center px-2">
            <h1 class="text-center mb-3 ">TIPOLOGIA DI PROGETTI</h1>
            <a href="{{route('admin.tecnologies.create')}}">AGGIUNGI TECNOLOGIA:</a>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($tecnologies as $tecnology)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{$tecnology->tecnology}}
                    </div>
                    <div>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">ELIMINA</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>


    </div>
</div>

@endsection