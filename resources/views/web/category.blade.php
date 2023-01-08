@extends('web.layout.layout')

@section('title', 'Thời trang mặc nhà cao cấp')

@section('content')
    <div class="content">
        <div>
            <div class="container">
                <div class="section-heading text-center">
                    <h2 class="Title">
                        <a href="">{{ $category->category_name }}</a>
                    </h2>
                </div>
                <div class="section-content">
                    <div class="section-content-listproduct row">
                        @include('web.list_product', ['products' => $products])
                    </div>
                </div>
                <div class="swaplist-buton">
                    @if ($products->previousPageUrl())
                        <a href="{{ $products->previousPageUrl() }}" class="buton btn-collection">
                            Prev
                        </a>
                    @endif
                    @if ($products->nextPageUrl())
                        <a href="{{ $products->nextPageUrl() }}" class="buton btn-collection">
                            Next
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>

@stop
