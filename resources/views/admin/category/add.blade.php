@extends('admin.main')

@section('content')
<form action="/admin/category/store" method="get">
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Category Title</label>
      <input name='cat_title' value="{{old('cat_title')}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category title">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

@csrf
</form>
</div>
@endsection
