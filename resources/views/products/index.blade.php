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
                <tr>
                  <td>Admin Admin</td>
                  <td>
                    <a href="mailto:admin@white.com">admin@white.com</a>
                  </td>
                  <td>25/02/2020 09:11</td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{ route('product.edit', 1) }}">Edit</a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection