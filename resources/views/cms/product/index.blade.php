@extends('cms.layout.index')
@section('content')

    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                Danh sách sản phẩm
                <div class="card-header-actions pr-1">
                    <a href="{{ route('admin.product.create') }}"><button class="btn btn-primary btn-sm mr-3"
                            type="button">Thêm mới</button></a>
                </div>
            </div>
            <div class="card-body">
                <form method="get" action="">
                    <div class="form-group row">
                        <div class="col-4">
                            <input type="text" value="{{ Request::get('keyword') ?? '' }}" name="keyword"
                                class="form-control" placeholder="Từ khóa">
                        </div>

                        <div class="col-3">
                            <select name="status" class="form-control">
                                <option value="">All</option>
                                <option {{ Request::get('status') == '0' ? 'selected' : '' }} value="0">Active</option>
                                <option {{ Request::get('status') == '1' ? 'selected' : '' }} value="1">Deactive
                                </option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input type="submit" class="btn btn-primary" value="Tìm kiếm">
                        </div>
                    </div>
                </form>
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th class="text-center w-5">ID</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Ảnh chi tiết</th>
                            <th>Giá sản phẩm</th>
                            {{-- <th>Ảnh sản phẩm</th> --}}
                            <th class="text-center w-15">Trạng thái</th>
                            <th class="text-center w-15">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($listItem))
                            @foreach ($listItem as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td><a target="_blank" rel="nofollow" href="">{{ $item->product_code }}</a></td>
                                    <td><a target="_blank" rel="nofollow" href="">{{ $item->product_name }}</a></td>
                                    <td><a target="_blank" rel="nofollow"
                                            href="">{{ $item->category->category_name }}</a></td>
                                    <td><img src="{{ $item->image ? asset($item->image) : ''}}" class="img-fluid d-block" id="lbl_img"
                                            width="50px"></td>
                                    <td><img src="{{ $item->image_detail ? asset($item->image_detail) : ''}}" class="img-fluid d-block" id="lbl_img"
                                            width="50px"></td>
                                    <td><a target="_blank" rel="nofollow" href="">{{ $item->price }}</a></td>
                                    {{-- <td><a target="_blank" rel="nofollow" href="">{{$item->image}}</a></td> --}}
                                    <td class="action">
                                        <a href=""
                                            class="{{ $item->is_delete == '0' ? 'btn btn-add' : 'btn btn-danger' }}">{{ $item->is_delete == '0' ? 'Active' : 'Deactive' }}</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{ route('admin.product.edit', $item->id) }}">
                                            <svg class="c-icon">
                                                <use xlink:href="/image/icon-svg/free.svg#cil-pencil"></use>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.product.destroy', $item->id) }}" method="POST"
                                            style="display:inline">
                                            @method ('DELETE')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không!');">
                                                <svg class="c-icon text-white">
                                                    <use xlink:href="{{ asset('image/icon-svg/free.svg#cil-trash') }}">
                                                    </use>
                                                </svg>
                                            </button>
                                        </form>
                                        {{-- <a  class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không!');" href="">
                                <svg class="c-icon text-white">
                                    <use xlink:href="{{ asset('image/icon-svg/free.svg#cil-trash') }}"></use>
                                </svg>
                            </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $listItem->appends($condition)->links('cms.layout.panigation') }}
            </div>
        </div>
    </div>

@endsection
