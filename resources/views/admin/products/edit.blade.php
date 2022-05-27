@extends('admin.main')

@section('content')
<form action="/admin/product/update/{{ $data[0]->product_id }}" method="post" enctype= "multipart/form-data" >
<div class="card-body">
    <div class="form-group">
      <label for="inputName">Product Name</label>
      <input type="text" name="product_title" value="{{ $data[0]->product_title }}" id="inputName" class="form-control">
    </div>
    <div class="row">
        <div class="col-sm-6">
            <label for="inputStatus">Category</label><br/>
            <select id="inputStatus" name='product_cat' class="form-control custom-select">
              <option selected="" disabled="">Select category</option>
              @foreach ($category as $cat)
                <option value="{{$cat->cat_id}}" {{ $cat->cat_id == $data[0]->product_cat ? 'selected' : '' }}>{{$cat->cat_title}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-sm-6">
            <label for="inputStatus">Brand</label><br/>
            <select id="inputStatus" name='product_brand'class="form-control custom-select">
              <option selected="" disabled="">Select brand</option>
              @foreach ($brand as $br)
                <option value="{{$br->brand_id}}" {{ $br->brand_id == $data[0]->product_brand ? 'selected' : '' }}>{{$br->brand_title}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Price</label>
            <input name="product_price" value="{{ $data[0]->product_price }}" type="text" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Quantity</label>
            <input name="product_qty" value="{{ $data[0]->product_qty  }}" type="text" class="form-control" placeholder="Enter ..." >
          </div>
        </div>
      </div>

    <div class="form-group">
      <label for="inputDescription">Description</label>
      <textarea name="product_desc" value="{{ $data[0]->product_desc }}" id="product_desc" class="form-control" rows="4">{{ $data[0]->product_desc }}</textarea>
    </div>
    <div class="form-group">
        <label for="inputProjectLeader">Image</label>
        <input name="image" type="file" value = "{{ $data[0]->product_image }}"class="form-control">
        <img src="{{ URL::to('/') }}/images/{{$data[0]->product_image}}" style="width:100px;height:100px">
    </div>
    <div class="form-group">
      <label for="inputProjectLeader">Product keywords</label>
      <input name="product_keywords" value="{{ $data[0]->product_keywords }}" type="text" id="inputProjectLeader" class="form-control">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
@csrf
</form>
@endsection
