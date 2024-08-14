<div class="col-sm-4">
    <div class="card m-3" style="width: 18rem;">
        <img src="{{ asset($product->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">
                {{ $product->name }} 
            </h5>
            <p class="card-text">{{ str($product->description)->limit(20) }} ..</p>
            <div class="row">
                <div class="btn-group d-flex justify-content-end" role="group" aria-label="Basic example">
                    <button data-id="{{ $product->id }}" class="addToCart btn btn-primary">Add</button>
                    @if (auth()->user()->isAdmin())
                      <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-warning">Editar</a>
                      <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST" onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>