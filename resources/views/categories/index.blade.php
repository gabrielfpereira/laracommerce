@extends('layouts.app', ['page' => __('Categorias'), 'pageSlug' => 'categories'])

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h3 class="card-title">Categorias</h3>
            </div>
            <div class="col-4 text-right">
              <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Adicionar Produto</a>
            </div>
          </div>
        </div>

        <div class="card-body">

          @if (session('message'))
            <div class="alert alert-{{session('message')['type']}}">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
              <span>
                {{ session('message')['content'] }}
              </span>
            </div>
          @endif
          
          <form method="POST" action="{{ session('category_edit') ? route('category.update', session('category_edit')['id']) : route('category.store')}}">
            @csrf
            @if(session('category_edit'))
                @method('PUT')
            @endif
            <div class="form-group">
              <label for="category">Categoria</label>
              <input 
                type="text" 
                name="name" 
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                id="category" 
                placeholder="Nome da categoria"
                value="{{ session('category_edit') ? session('category_edit')['name'] : '' }}"
              >
              @include('alerts.feedback', ['field' => 'name'])
            </div>
                  
            <button type="submit" class="btn btn-primary">
              @if (session('category_edit'))
                Salvar
              @else
                Cadastrar                  
              @endif
            </button>
          </form>

          <div class="">
            <table class="table tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Data de Criação</th>
                  <th scope="col"></th>
                </tr>
             </thead>
              <tbody>
                @foreach ($categories as $category)                    
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->created_at }}</td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{ route('category.edit', $category->id) }}">Edit</a>
                        <div >
                          <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item" type="submit">Excluir</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>
@if (session('success'))
    <script>
      function showNotification(from, align){
        color = 2;

          $.notify({
              icon: "tim-icons icon-bell-55",
              message: {{ session('success') }}

            },{
                type: type[color],
                timer: 8000,
                placement: {
                    from: from,
                    align: align
                }
            });
      }
      showNotification('top','right')
    </script>
@endif

@endsection