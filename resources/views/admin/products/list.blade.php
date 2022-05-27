@extends('admin.main')

@section('content')
    {{-- search --}}
    <a href="/admin/product/add" class="btn btn-primary float-left" >Thêm sản phẩm</a>
    <div class="row">
        <div class="col-md-6 offset-md-6">
            <form action="/admin/product/search" method="get">
                <div class="input-group">
                    <h2 class="text-right display-6 mr-2 mt-1">Search</h2>
                    <input type="search" name="search" class="form-control form-control-lg"
                        placeholder="Type your keywords here">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Descreption</th>
                <th>Image</th>
                <th>KeyWord</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $d)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->categories->cat_title }}</td>
                    <td>{{ $d->brand->brand_title }}</td>
                    <td>{{ $d->product_title }}</td>
                    <td>${{ $d->product_price }}</td>
                    <td>{{ $d->product_qty }}</td>
                    <td>
                        <div style="height:150px;overflow:auto;">{!! $d->product_desc !!}</div>
                    </td>
                    <td><img src="{{ URL::to('/') }}/images/{{$d->product_image}}" style="width:100px;height:100px"></td>
                    <td>
                        <div style="width:50px;overflow:auto;">{{ $d->product_keywords }}</div>
                    </td>
                    <td><a href="/admin/product/delete/{{$d->product_id}}">Xóa</a></td>
                    <td><a href="/admin/product/edit/{{$d->product_id}}">Sửa</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span>
        {{ $data->links('admin.paginate') }}
    </span>
@endsection
