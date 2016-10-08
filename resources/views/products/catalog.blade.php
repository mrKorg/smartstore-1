@extends('layouts.index')

@section('content')

<div class="breadcrumb-wrapper">
    <div class="container">
        <h1>Catalog</h1>
    </div>
</div>

<div class="space-60"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <div class="row">
                @foreach($categories as $category)
                <div class="col-sm-4">
                    <div class="item_holder">
                        <a href="/category/{{ $category->alias }}">
                            <img src="{{ asset('uploads/images/categories/' . $category->preview ) }}" alt="{{ $category->category }}" class="img-responsive">
                        </a>
                        <div class="title">
                            <h5>
                                @if(strlen($category->category) > 40)
                                {{ mb_substr($category->category,0,40,'UTF-8') . '...' }}
                                @else
                                {{ $category->category }}
                                @endif
                            </h5>
                            <p>
                                @if(strlen($category->category) > 45)
                                {{ mb_substr($category->description,0,45,'UTF-8') . '...' }}
                                @else
                                {{ $category->description }}
                                @endif
                            </p>
                        </div>
                    </div><!--item holder-->
                </div><!--col end-->
                @endforeach
            </div><!--row-->
            <!--pagination-->
            <nav class="pull-right clearfix">
                {{ $categories->links() }}
            </nav>
            <!--pagination end-->
        </div>

        <div class="col-md-3 col-md-offset-1">
            @include('includes.categories_menu')
        </div><!--sidebar col-->
    </div>
</div>
<div class="space-60"></div>

@endsection
