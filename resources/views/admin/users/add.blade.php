@extends('admin.main')

@section('content')
<form action="/admin/brand/store" method="get">
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Brand Title</label>
      <input name='brand_title' value="{{old('brand_title')}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter category title">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

@csrf
</form>
</div>
@endsection
