@extends('web.layout.layout')

@section('title', 'Thời trang mặc nhà cao cấp')

@section('content')
    <div class="content">
        <div>
            <div class="container">
                <div class="section-heading text-center">
                    <h2 class="Title">
                        <a href="">{{ $category[0]->category_name }}</a>
                    </h2>
                </div>
                <div class="section-content">
                    <div class="section-content-listproduct row">
                        @include('web.list_product', ['products' => $category[0]->products])
                    </div>
                </div>
                {{-- <div class="swaplist-buton">
                    @if ($category[0]->products->previousPageUrl())
                        <a href="{{ $category[0]->products->previousPageUrl() }}" class="buton btn-collection">
                            Prev
                        </a>
                    @endif
                    @if ($category[0]->products->nextPageUrl())
                        <a href="{{ $category[0]->products->nextPageUrl() }}" class="buton btn-collection">
                            Next
                        </a>
                    @endif
                </div> --}}
            </div>

        </div>
    </div>

@stop
