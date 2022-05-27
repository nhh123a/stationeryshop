@extends('admin.main')

@section('content')
    {{-- search --}}
    <a href="/admin/category/add" class="btn btn-primary float-left" >Thêm danh mục</a>
    <div class="row">
        <div class="col-md-6 offset-md-6">
            <form action="/admin/category/search" method="get">
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
                <th>Title</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $d)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->cat_title }}</td>
                    <td><a href="/admin/category/delete/{{$d->cat_id}}">Xóa</a></td>
                    <td><a href="/admin/category/edit/{{$d->cat_id}}">Sửa</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span>
        {{ $data->links('admin.paginate') }}
    </span>
@endsection
