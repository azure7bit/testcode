<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label for="name" class="col-md-4 control-label">Name</label>

  <div class="col-md-6">
    <input id="name" type="text" class="form-control" name="name" value="{{ $category->exists ? $category->name : old('name') }}" autofocus>

    @if ($errors->has('name'))
    <span class="help-block">
      <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
  <label for="description" class="col-md-4 control-label">Description</label>

  <div class="col-md-6">
    <textarea id="description" type="text" class="form-control" name="description">{{ $category->exists ? $category->description : old('description') }}</textarea>

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