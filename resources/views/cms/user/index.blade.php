@extends('cms.layout.index')
@section('content')
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                DANH SÁCH TÀI KHOẢN
                <div class="card-header-actions pr-1">
                    <a class="btn btn-add btn-sm mr-2" href="{{ route('admin.user.create') }}">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('image/icon-svg/free.svg#cil-plus') }}"></use>
                        </svg> Thêm
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ url()->current() }}">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('image/icon-svg/free.svg#cil-reload') }}"></use>
                        </svg> Tải lại
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th class="text-center w-5">ID</th>
                            <th>Tên tài khoản</th>
                            <th class="text-center w-15">Số điện thoại</th>
                            <th class="text-center w-15">Email</th>
                            <th class="text-center w-15">Trạng thái</th>
                            <th class="text-center w-15">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td>{{ $item->username }}</td>
                                <td class="text-center">
                                    {{ $item->phone }}
                                </td>
                                <td class="text-center">
                                    {{ $item->email }}
                                </td>
                                <td class="action">
                                    <a href="" class=""></a>
                                    @if ($item->is_active == 0)
                                        <span style="color: brown">Chưa các thực</span>
                                    @else
                                        <span style="color: darkgreen">Đã xác thực</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a class="btn btn-info" href="{{ route('admin.user.edit', $item->id) }}">
                                        <svg class="c-icon">
                                            <use xlink:href="/image/icon-svg/free.svg#cil-pencil"></use>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.user.destroy', $item->id) }}" method="POST"
                                        style="display:inline">
                                        @method ('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc muốn xóa bản ghi này không!');">
                                            <svg class="c-icon text-white">
                                                <use xlink:href="{{ asset('image/icon-svg/free.svg#cil-trash') }}"></use>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $users->appends($condition)->links('cms.layout.panigation') }} --}}
                {{-- {{ $users->links('cms.layout.panigation') }} --}}
            </div>
        </div>
    </div>
@endsection
