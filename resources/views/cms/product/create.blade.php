@extends('cms.layout.index')
@section('content')
    <div class="fade-in">
        <!-- view này action đến admin/category/form -->
        <form method="post" action="{{ route('product.store') }}">
            <div class="row add-new">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <p>THÊM MỚI SẢN PHẨM</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Mã sản phẩm <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="product_code" type="text"
                                            placeholder="Mã sản phẩm" value="{{ old('product_code') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="product_name" type="text"
                                            placeholder="Tên sản phẩm" value="{{ old('product_name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Gía sản phẩm <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="price" type="number"
                                            placeholder="Gía sản phẩm" value="{{ old('price') }}">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Ảnh sản phẩm <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="image" type="text"
                                            placeholder="Ảnh sản phẩm" value="{{ old('image') }}">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Trạng thái <span class="text-danger">(*)</span></label>
                                        <select name="is_delete" class="form-control">
                                            <option {{ old('is_delete')}} value="0">Active
                                            </option>
                                            <option {{ old('is_delete')}} value="1">Deactive
                                            </option>
                                        </select>
                                    </div>
                                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                    <div>
                                        <span class="text-danger">(*)</span>
                                        {{ $error }}
                                    </div>
                                    @endforeach
                                    @endif
                                    <span class="text-danger">(*) Trường bắt buộc</span>
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
        var url_ajax_load_category = "{{route('cms.category.loadAjax')}}";
    </script>
    <script src="{{url('cms/js/category.js')}}"></script> --}}
@endsection
