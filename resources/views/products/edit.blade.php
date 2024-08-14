@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h3>Create product</h3>
        <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
          @method('PATCH')
          @include('products._form', ['product' => $product])
          <button class="btn btn-primary" type="submit">Crear</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection