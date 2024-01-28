<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang bán hàng </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('asset/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('bower_components/bootstrap/css/bootstrap.min.css') }} ">

    <!-- Font awesome star css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Font awesome star css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/jquery-bar-rating/css/fontawesome-stars.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/icofont/css/icofont.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/feather/css/feather.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

     <!-- notify js Fremwork -->
     <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/pnotify/css/pnotify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/pnotify/css/pnotify.brighttheme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/pages/pnotify/notify.css') }}">
</head>

<body>
            <!-- Main-body start -->
            <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Product</h4>
                                                    <button><a href="{{route('products')}}">Product</a></button>
                                                    <button><a href="{{route('Categories')}}">Categories</a></button>
                                                    <button><a href="{{route('cart')}}">Giỏ hàng</a></button>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">E-Commerce</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Product</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="input-group mt-3">
                                            <input id="inputSearch" type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
                                            <div class="input-group-append">
                                                <button id="searchProduct" class="btn btn-primary" type="button">Tìm kiếm</button>
                                            </div>
                                        </div>
                                        <!-- Product list start -->
                                        <div class="row" id="sale">


                                        </div>
                                        <div class="pagination-container"></div>
                                        <!-- Product list end -->
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js tự viết -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script  src="{{asset('jstrangbanhang.js')}}"></script>

    <script type="text/javascript" src=" {{asset('bower_components/pnotify/js/pnotify.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/pages/pnotify/notify.js ')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('bower_components/modernizr/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/modernizr/js/css-scrollbars.js') }}"></script>

    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('/bower_components/i18next/js/i18next.min.js') }}"></script>
    <script src="{{ asset('asset/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

<!-- Custom js -->
<script type="text/javascript" src="{{ asset('asset/js/script.js') }}"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
