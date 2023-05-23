@extends('layouts.app', ['page' => __('Produtos'), 'pageSlug' => 'products'])

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h3 class="card-title">Produtos</h3>
            </div>
            <div class="col-4 text-right">
              <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Adicionar Produto</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <form action="{{ route('product.filter.name') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col">
                <input name="filter_name" type="text" class="form-control" placeholder="Pesquise o produto pelo nome..." aria-describedby="button-addon2">
                
              </div>
              <div class="col">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if ($category_selected)
                      {{ $category_selected->name }}
                    @else
                      Categoria                        
                    @endif
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($categories as $category)
                      <a class="dropdown-item" href="{{ route('product.filter.category', $category->id) }}">{{ $category->name }}</a>                        
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-simple">Pesquisar</button>

          </form>
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

          <div class="dropdown-divider"></div>

          <div class="">
            <table class="table tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Preço</th>
                  <th scope="col">Data de Criação</th>
                  <th scope="col">Categorias</th>
                  <th scope="col"></th>
                </tr>
             </thead>
              <tbody>
                @foreach ($products as $product)
                    
                <tr>
                  <td>{{ $product->title }}</td>
                  <td>
                    {{ $product->price }}
                  </td>
                  <td>{{ $product->created_at }}</td>
                  <td>
                  @foreach ($product->categories as $category)
                    {{ $product->categories->count() > 1 ? $loop->last ? $category->name : "$category->name |" : $category->name }}                      
                  @endforeach
                  </td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{ route('product.edit', 1) }}">Edit</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="dropdown-item" type="submit">Excluir</button>
                        </form>
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
@endsection