@csrf
<div class="form-group">
  <label for="exampleInputEmail1">Name</label>
  <input type="text" class="form-control" name="name" value="{{ $product->name }}">
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Price</label>
  <input type="number" class="form-control" name="price" value="{{ $product->price }}">
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Category</label>
  <select name="category_id" class="form-control">
    @foreach($categories as $category)
      <option value="{{ $category->id }}" @selected($category->id == $product->category_id)>{{ $category->name }}</option>
    @endforeach
  </select>
</div>
