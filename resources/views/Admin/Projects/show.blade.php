@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-3">
        {{$project->title}}
    </h1>
    <div class="mt-5 text-center">
        SLUG: {{$project->slug}}
    </div>
    <p class="text-center">DESCRIPTION: {{$project->description}}</p>
    <div class="text-center">
        TYPE: <strong>{{$project->type ? $project->type->slug : 'Nessuna Categoria'}}</strong>
    </div>
    <div class="text-center d-flex gap-2 justify-content-center mt-3">
        <span>Tecnology:</span>
        @foreach ($project->tecnologies as $tecnology )
            <strong class="d-block">{{$tecnology->tecnology}}</strong>
        @endforeach
    </div>
    <div class="d-flex align-items-center justify-content-center gap-4 mt-3" id="form">
        <a href="{{route('admin.projects.edit', $project)}}">Modifica</a>
        <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
            @csrf
            @method('DELETE')
            <button id="trash" class="btn text-danger">Elimina</button>
        </form>
    </div>
    <!-- <script>
          let trash = document.getElementById('trash')

          trash.addEventListener('click', function () {

            let form = document.getElementById('form')

            let trashConf = confirm('Sei sicuro di volere eliminare?')
            if (trashConf === true) {

              form.innerHTML +=
                `
                          <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                          @method('DELETE')
                          @csrf

                          
     
                          <button type="submit" style="display:none;" id='confirm'>trash</button>

                          </form>
                        `
              let confirm = document.getElementById('confirm').click()

            }


          })
        </script> -->
</div>
@endsection