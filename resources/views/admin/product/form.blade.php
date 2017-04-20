<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label for="name" class="col-md-4 control-label">Name</label>

  <div class="col-md-6">
    <input id="name" type="text" class="form-control" name="name" value="{{ $product->exists ? $product->name : old('name') }}" autofocus>

    @if ($errors->has('name'))
    <span class="help-block">
      <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
  <label for="category_id" class="col-md-4 control-label">Category</label>

  <div class="col-md-6">
    <select id="category_id" class="form-control" name="category_id">
      @foreach($categories as $category)
        <option value="{{$category->id}}" selected="{{$product->exists ? $product->category_id : $category->id}}">{{ $category->name}}</option>
      @endforeach
    </select>

    @if ($errors->has('category_id'))
      <span class="help-block">
        <strong>{{ $errors->first('category_id') }}</strong>
      </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('store_id') ? ' has-error' : '' }}">
  <label for="store_id" class="col-md-4 control-label">Store</label>

  <div class="col-md-6">
    <select id="store_id" class="form-control" name="store_id">
      @foreach($stores as $store)
        <option value="{{$store->id}}" selected="{{$product->exists ? $product->store_id : $store->id}}">{{$store->name}}</option>
      @endforeach
    </select>

    @if ($errors->has('store_id'))
      <span class="help-block">
        <strong>{{ $errors->first('store_id') }}</strong>
      </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
  <label for="selling_price" class="col-md-4 control-label">Selling Price</label>

  <div class="col-md-6">
    <input id="selling_price" type="text" class="form-control" name="selling_price" value="{{ $product->exists ? $product->selling_price : old('selling_price') }}" autofocus>

    @if ($errors->has('selling_price'))
      <span class="help-block">
        <strong>{{ $errors->first('selling_price') }}</strong>
      </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('purchasing_price') ? ' has-error' : '' }}">
  <label for="purchasing_price" class="col-md-4 control-label">Purchasing Price</label>

  <div class="col-md-6">
    <input id="purchasing_price" type="text" class="form-control" name="purchasing_price" value="{{ $product->exists ? $product->purchasing_price : old('purchasing_price') }}" autofocus>

    @if ($errors->has('purchasing_price'))
      <span class="help-block">
        <strong>{{ $errors->first('purchasing_price') }}</strong>
      </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('product_sku') ? ' has-error' : '' }}">
  <label for="product_sku" class="col-md-4 control-label">Product SKU</label>

  <div class="col-md-6">
    <input id="product_sku" type="text" class="form-control" maxlength="5" name="product_sku" value="{{ $product->exists ? $product->product_sku : old('product_sku') }}" autofocus>

    @if ($errors->has('product_sku'))
      <span class="help-block">
        <strong>{{ $errors->first('product_sku') }}</strong>
      </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
  <label for="qty" class="col-md-4 control-label">Quantity</label>

  <div class="col-md-6">
    <input id="qty" type="text" class="form-control" maxlength="5" name="qty" value="{{ $product->exists ? $product->qty : old('qty') }}" autofocus>

    @if ($errors->has('qty'))
      <span class="help-block">
        <strong>{{ $errors->first('qty') }}</strong>
      </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
  <label for="description" class="col-md-4 control-label">Description</label>

  <div class="col-md-6">
    <textarea id="description" type="text" class="form-control" name="description">{{ $product->exists ? $product->description : old('description') }}</textarea>

    @if ($errors->has('description'))
      <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
      </span>
    @endif
  </div>
</div>

<div class="form-group">
  <div class="col-md-8 col-md-offset-4">
    <button type="submit" class="btn btn-primary">
      Submit
    </button>
  </div>
</div>