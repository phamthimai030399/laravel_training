@extends('cms.layout.index')
@section('content')
    <div class="fade-in">
        <form method="post" action="{{route('admin.category.update', $item->id)}}">
            @method('PUT')
            <div class="row add-new">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <p>CHỈNH SỬA DANH MỤC</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Mã danh mục <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="category_code" type="text"
                                            placeholder="Mã danh mục" value="{{$item->category_code}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên danh mục <span class="text-danger">(*)</span></label>
                                        <input class="form-control" name="category_name" type="text"
                                            placeholder="Tên danh mục" value="{{$item->category_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái <span class="text-danger">(*)</span></label>
                                        <select name="is_active" class="form-control">
                                            <option {{($item->is_active) == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{($item->is_active) == 0 ? 'selected' : '' }} value="0">Deactive
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
        var url_ajax_load_category = "{{ route('cms.category.loadAjax') }}";
    </script>
    <script src="{{ url('cms/js/category.js') }}"></script> --}}
@endsection
