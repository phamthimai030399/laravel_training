@extends('cms.layout.index')
@section('content')
    <div class="fade-in">
        <form method="post" action="{{ route('admin.product.update', $item->id) }}">
            @method('PUT')
            <div class="row add-new">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <p>CHỈNH SỬA SẢN PHẨM</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Danh mục <span class="text-danger">(*)</span></label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $cate)
                                                <option
                                                    {{ (old('category_id') ?? $item->category_id) == $cate->id ? 'selected' : '' }}
                                                    value="{{ $cate->id }}">
                                                    {{ $cate->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="product_code" type="text"
                                            placeholder="Mã sản phẩm"
                                            value="{{ old('product_code') ?? $item->product_code }}">
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="product_name" type="text"
                                            placeholder="Tên sản phẩm"
                                            value="{{ old('product_name') ?? $item->product_name }}">
                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Gía sản phẩm <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="price" type="text" placeholder="Gía sản phẩm"
                                            value="{{ old('price') ?? $item->price }}">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái <span class="text-danger">(*)</span></label>
                                        <select name="is_delete" class="form-control">
                                            <option {{ (old('is_delete') ?? $item->is_delete) == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ (old('is_delete') ?? $item->is_delete) == 0 ? 'selected' : '' }} value="0">Deactive
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- <script type="text/javascript">
        var url_ajax_load_product = "{{ route('cms.product.loadAjax') }}";
    </script>
    <script src="{{ url('cms/js/product.js') }}"></script> --}}
@endsection
