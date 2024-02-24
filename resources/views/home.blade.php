@extends('layouts.app')

@section('content')

    <!-- Shop Section Start -->
    <div class="section section-padding mt-n10" data_name_route="<?= !empty($nameRoute) ? $nameRoute : '' ?>" >
        <div class="container">

            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <!-- Shop top Bar Start -->
                    <div class="shop-top-bar">
                        <div class="shop-text">
                            <p><span>{{$products->perPage() * $products->currentPage()}}</span> продуктов показано из <span>{{$products->total()}}</span></p>
                        </div>
                        <div class="shop-tabs">
                            <ul class="nav">
                                <li><button class="active" data-bs-toggle="tab" data-bs-target="#grid"><i class="fa fa-th"></i></button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#list"><i class="fa fa-list"></i></button></li>
                            </ul>
                        </div>
                        <div class="shop-sort">
                            <span class="title">Sort By :</span>
                            <select class="nice_select">
                                <option value="1">Default</option>
                                <option value="2">Default</option>
                                <option value="3">Default</option>
                                <option value="4">Default</option>
                            </select>
                        </div>
                    </div>
                    <!-- Shop top Bar End -->

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="grid">

                            <!-- Shop Product Wrapper Start -->
                            <div class="shop-product-wrapper">
                                <div class="row content">

                                    @foreach($products as $product)

                                        <div class="col-lg-4 col-sm-6">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{$product->image}}" alt="product"></a>
                                                <div class="product-content">
                                                    <h4 class="title"><a href="{{$product->slug}}">{{$product->name}}</a></h4>
                                                    <div class="price">
                                                        <span class="sale-price">${{$product->price}}</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="javascript:;"><i class="pe-7s-search"></i></a></li>
                                                    <li>
                                                        <form method="POST" action="{{ route('cart_add') }}">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                                            <input type="hidden" name="kolvo" value="1"/>
                                                            @if(in_array($product->id, $productsBasketIds))
                                                                <a class="action basket" href="javascript:;"><i class="pe-7s-shopbag"></i></a>
                                                            @else
                                                                <a class="action" href="javascript:;" onclick="parentNode.submit();"><i class="pe-7s-shopbag"></i></a>
                                                            @endif
                                                        </form>
                                                    </li>
                                                    <li><a class="action" href="#"><i class="pe-7s-like"></i></a></li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>

                                    @endforeach

                                </div>
                            </div>
                            <!-- Shop Product Wrapper End -->

                        </div>
                        <div class="tab-pane fade" id="list">

                            <!-- Shop Product Wrapper Start -->
                            <div class="shop-product-wrapper content">

                            @foreach($products as $product)
                                <!-- Single Product Start -->
                                    <div class="single-product-02 product-list">
                                        <div class="product-images">
                                            <a href="#"><img src="{{$product->image}}" alt="product"></a>

                                            <ul class="product-meta">
                                                <li><a class="action" data-bs-toggle="modal" data-bs-target="#quickView" href="javascript:;"><i class="pe-7s-search"></i></a></li>
                                                <li>
                                                    <form method="POST" action="{{ route('cart_add') }}">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                                        <input type="hidden" name="kolvo" value="1"/>
                                                        @if(in_array($product->id, $productsBasketIds))
                                                            <a class="action basket" href="javascript:;"><i class="pe-7s-shopbag"></i></a>
                                                        @else
                                                            <a class="action" href="javascript:;" onclick="parentNode.submit();"><i class="pe-7s-shopbag"></i></a>
                                                        @endif
                                                    </form>
                                                </li>
                                                <li><a class="action" href="javascript:;"><i class="pe-7s-like"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h4 class="title"><a href="{{$product->slug}}">{{$product->name}}</a></h4>
                                            <div class="price">
                                                <span class="sale-price">${{$product->price}}</span>
                                            </div>
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach

                            </div>
                            <!-- Shop Product Wrapper End -->

                        </div>
                    </div>

                    <!-- Page pagination Start -->
                    <div class="page-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="/?page=1"><i class="fa fa-angle-left"></i></a></li>
                            @for($i=1; $i<=$products->lastPage(); $i++)
                                <li class="page-item"><a class="page-link {{ ((int)$products->currentPage() === $i) ? 'active' : '' }}" href="/?page={{$i}}">{{$i}}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="/?page={{$products->lastPage()}}"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Page pagination End -->

                </div>
                <div class="col-lg-3">

                    <!-- Sidebar Start -->
                    <div class="sidebar">

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">
                            <div class="widget-search">
                                <form action="#">
                                    <input type="text" placeholder="Search">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">

                            <h4 class="widget-title">Filter By Categories</h4>

                            <div class="widget-checkbox widget-categories">
                                <ul class="checkbox-items">
                                    <li>
                                        <input type="checkbox" id="checkbox1">
                                        <label for="checkbox1"> <span></span>Office Chair</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox2">
                                        <label for="checkbox2"> <span></span>Dining Chair</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox3">
                                        <label for="checkbox3"> <span></span>Office Table</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox4">
                                        <label for="checkbox4"> <span></span>Dining Table</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox5">
                                        <label for="checkbox5"> <span></span>Bed Light</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox6">
                                        <label for="checkbox6"> <span></span>Sofa Set</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox7">
                                        <label for="checkbox7"> <span></span>Office Chair</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">

                            <h4 class="widget-title">Refine By</h4>

                            <div class="widget-checkbox">
                                <ul class="checkbox-items">
                                    <li>
                                        <input type="checkbox" id="checkbox8">
                                        <label for="checkbox8"> <span></span>On Sale</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox9">
                                        <label for="checkbox9"> <span></span>New</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox10">
                                        <label for="checkbox10"> <span></span>In Stock</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">

                            <h4 class="widget-title">Filter By Price</h4>

                            <div class="widget-price">
                                <input id="price-range" type="text">
                            </div>
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">

                            <h4 class="widget-title">Filter By Color</h4>

                            <div class="widget-checkbox">
                                <ul class="checkbox-items">
                                    <li>
                                        <input type="checkbox" id="checkbox11">
                                        <label for="checkbox11"> <span class="color-blue"></span>Blue</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox12">
                                        <label for="checkbox12"> <span class="color-dark-blue"></span>Dark Blue</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox13">
                                        <label for="checkbox13"> <span class="color-gray"></span>Gray</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox14">
                                        <label for="checkbox14"> <span class="color-green"></span>Green</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox15">
                                        <label for="checkbox15"> <span class="color-gray-dark"></span>Light Black</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox16">
                                        <label for="checkbox16"> <span class="color-lower-blue"></span>Lower Blue</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">

                            <h4 class="widget-title">Size</h4>

                            <div class="widget-checkbox">
                                <ul class="checkbox-items">
                                    <li>
                                        <input type="checkbox" id="checkbox17">
                                        <label for="checkbox17"> <span></span>S</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox18">
                                        <label for="checkbox18"> <span></span>M</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox19">
                                        <label for="checkbox19"> <span></span>Xl</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="checkbox20">
                                        <label for="checkbox20"> <span></span>XXL</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Widget End -->



                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">

                            <h4 class="widget-title">Tags</h4>

                            <div class="widget-tags">
                                <ul class="tags-list">
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">For Men</a></li>
                                    <li><a href="#">Women</a></li>
                                    <li><a href="#">Fashion</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Widget End -->

                    </div>
                    <!-- Sidebar End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Shop Section End -->

@endsection
