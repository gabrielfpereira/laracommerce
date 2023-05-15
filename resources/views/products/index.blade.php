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

          <div class="">
            <table class="table tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Preço</th>
                  <th scope="col">Data de Criação</th>
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