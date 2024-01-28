<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh mục sản phẩm </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('asset/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/icofont/css/icofont.css') }}">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/component.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/feather/css/feather.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/jquery.mCustomScrollbar.css') }}">
    <!-- notify js Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/pnotify/css/pnotify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/pnotify/css/pnotify.brighttheme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/pages/pnotify/notify.css') }}">
    <!-- jquery file upload Frame work -->
    <link href="{{ asset('/asset/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/asset/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- css tự viết -->
    <link href="{{ asset('asset/styleproduct.css') }}" rel="stylesheet">

</head>

<body>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <div class="d-inline">
                                <h4>Quản lý đơn đặt hàng</h4>
                                <button><a href="{{route('products')}}">Product</a></button>
                                <button><a href="{{route('sale')}}">Trang bán hàng</a></button>
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
                                <li class="breadcrumb-item"><a href="#!">Quản lý đơn hàng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-header end -->

            <!-- Page-body start -->
            <div class="page-body">

                <!-- Edit With Button card start -->
                <table class="table table-striped table-bordered" id="example-1"></table>
                <div class="card">
                    <div class="card-header">
                        <h5>Quản lý đơn hàng</h5>

                        <div class="input-group mt-3">
                            <input id="inputSearch" type="text" class="form-control" placeholder="Tìm kiếm đơn hàng">
                            <div class="input-group-append">
                                <button id="searchOrder" class="btn btn-primary" type="button">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="example-2">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng tiền</th>
                                    <th>Số sản phẩm</th>
                                    <th>Trạng thái</th>
                                    <th>Duyệt</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- start modal update -->
                <div id="modal-container" class="modala">
                    <div class="md-content">
                        <h3 class="f-26">Chi tiết đơn hàng</h3>
                        <div>
                            <table id="order-detail" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>image</th>
                                    <th>Số lượng</th>
                                    <th>Giá gốc</th>
                                    <th>Giá bán</th>
                                    <th>Tổng tiền sản phẩm</th>
                                    <th>Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div class="input-group">
                                <select id="selectStatus" class="form-control stock">
                                    <option value="1">Chờ duyệt</option>
                                    <option value="2">Đã duyệt</option>
                                    <option value="3">Hoàn thành</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button id="saveStatus" type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block save_btn">Duyệt đơn hàng</button>
                            <button  type="button" onclick="hideModal()" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block close_btn">Close</button>
                        </div>
                    </div>
                </div>
                <!-- end modal update -->

            </div>
            <!-- Page-body end -->
        </div>
    </div>
    <!-- Main-body end -->

    <!-- js tự viết -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('jsquanly-donhang.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type="text/javascript" src=" {{asset('bower_components/pnotify/js/pnotify.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/pages/pnotify/notify.js ')}}"></script>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

    <!-- Editable-table js -->
    <script type="text/javascript" src="{{ asset('asset/pages/edit-table/jquery.tabledit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/pages/edit-table/editable.js') }}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('/bower_components/i18next/js/i18next.min.js') }}"></script>
    <script src="{{ asset('asset/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('asset/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('asset/js/vartical-layout.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/script.js') }}"></script>

    <!-- datatable js -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

    <!-- jquery file upload js -->
    <script src="{{ asset('asset/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script src="{{ asset('asset/pages/filer/custom-filer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/pages/filer/jquery.fileuploads.init.js') }}" type="text/javascript"></script>
    <!-- Model animation js -->
    <script src="{{ asset('asset/js/classie.js') }}"></script>
    <script src="{{ asset('asset/js/modalEffects.js') }}"></script>
    <!-- product list js -->
    <script type="text/javascript" src="{{ asset('/asset/pages/product-list/product-list.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <!--  -->

    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('/asset/js/script.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>


</html>
