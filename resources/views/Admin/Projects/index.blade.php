@extends('layouts.app')

@section('content')
<div class="container-md">
  <table class="table ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Type</th>
        <th scope="col">Description</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $item)
      <tr>
      <th scope="row">{{$item->id}}</th>
      <td><a href="{{route('admin.projects.show', $item)}}">{{$item->title}}</a></td>
      <td>{{$item->type ? $item->type->type : 'N.C'}}</td>
      <td>{{$item->description}}</td>
      <td class="" id="form">
        <div class="d-flex gap-3 align-items-center justify-content-center">
          <a href="{{route('admin.projects.edit', $item)}}">Modifica</a>

        <form action="{{route('admin.projects.destroy', $item)}}" method="POST">
        @csrf
        @method('DELETE')
        <button id="trash" class="btn text-danger">Elimina</button>

        </form>
        <!-- <script>
          let trash = document.getElementById('trash')

          trash.addEventListener('click', function () {

            let form = document.getElementById('form')

            let trashConf = confirm('Sei sicuro di volere eliminare?')
            if (trashConf === true) {

              form.innerHTML +=
                `
                          <form action="{{ route('admin.projects.destroy', $item) }}" method="POST">
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
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  
</div>
@endsection