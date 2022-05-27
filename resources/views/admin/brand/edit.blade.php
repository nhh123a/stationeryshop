@extends('admin.main')

@section('content')
<form action="/admin/brand/update/{{$data->brand_id}}" method="post">
<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Brand Title</label>
      <input name='brand_title' value="{{ $data->brand_title}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter brand title">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

@csrf
</form>
</div>
@endsection
