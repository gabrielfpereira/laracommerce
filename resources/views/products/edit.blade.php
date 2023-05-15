@extends('layouts.app', ['page' => __('Produtos'), 'pageSlug' => 'products'])

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h3 class="card-title">Editar Produto</h3>
            </div>
            <div class="col-4 text-right">
              <a href="#" class="btn btn-sm btn-primary">Adicionar Categoria</a>
            </div>
          </div>
        </div>

        <div class="card-body">

            <form>
                <div class="form-group">
                  <label for="product-name">Nome do produto</label>
                  <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="product-name" placeholder="Digite o nome do produto...">
                  @include('alerts.feedback', ['field' => 'title'])
                </div>

                <div class="form-group">
                  <label for="product-description">Descrição</label>
                  <input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="product-description" placeholder="Faça uma breve descrição do seu produto...">
                  @include('alerts.feedback', ['field' => 'description'])
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="product-price">Preço</label>
                            <input type="number" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="product-price" placeholder="Quanto custa seu produto?">
                            @include('alerts.feedback', ['field' => 'price'])
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="product-category">Categoria</label>
                            <select class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" id="product-category" name="category">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'category'])
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="product-details">Detalhes do Produto</label>
                    <textarea class="form-control" id="product-details" name="" cols="80" rows="50" placeholder="Descreva com detalhes o seu produto...">

                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </form>
        </div>

          
      </div>
    </div>
  </div>
</div>
@endsection