<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>
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
    <link rel="icon" href="{{ asset('asset/images/favicon.ico') }}" type="image/x-icon">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('asset/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/icofont/css/icofont.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/icon/feather/css/feather.css') }}">
    <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/jquery.steps/css/jquery.steps.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/jquery.mCustomScrollbar.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- notify js Fremwork -->
     <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/pnotify/css/pnotify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/pnotify/css/pnotify.brighttheme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/pages/pnotify/notify.css') }}">
</head>

<body>
    <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Shopping Cart</h4>
                                                    <button><a href="{{route('products')}}">Product</a></button>
                                                    <button><a href="{{route('Categories')}}">Categories</a></button>
                                                    <button><a href="{{route('sale')}}">Trang bán hàng</a></button>
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
                                                    <li class="breadcrumb-item"><a href="#!">Shopping cart</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Shopping cart start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Shopping cart</h5>
                        
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="wizard" >
                                    <section>
                                        <form class="wizard-form" id="basic-forms" action="#">
                                            <!-- Shopping cart field et start -->
                                            <h3> Your Shopping Cart </h3>
                                            <fieldset >
                                            <div class="table-wrapper">
                                                <table id="e-product-list" class="table table-responsive table-striped dt-responsive nowrap dataTable no-footer dtr-inline cart-page" role="grid"  ">
                                                    <thead>
                                                        <tr>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">Chọn</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">Hình ảnh</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 1023px;">Sản phẩm</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 153px;">Đơn giá</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 153px;">Số lượng</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Tổng tiền</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 134px;text-align:center">Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                       
                                                        
                                                    </tbody>
                                                </table>
                                               </div>
                                            </fieldset>
                                            <!-- Shopping cart fieldset end -->
                                            <!-- Delivery Details fieldset start -->
                                            <h3> Delivery Details </h3>
                                            <fieldset class="bank-detail p-t-5">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Full name *</label>
                                                                    <input id="name-2" name="name" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                     
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="address" class="form-label">Address *</label>
                                                                    <input id="address" name="address" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="phone-2" class="form-label">Phone #</label>
                                                                    <input id="phone-2" name="phone" type="number" class="form-control phone">
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <button id="submitCart" type="submit" class="btn btn-primary btn-block">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        
                                                    </div>
                                                </div>

                                            </fieldset>
                                            <!-- Delivery Details fieldset end -->
                                          
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shopping cart start -->
            </div>
        </div>
    </div>
    <!-- Page body end -->
  
</div>
<!-- Main-body end -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <script src="{{asset('jscart.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('bower_components/modernizr/js/modernizr.js') }}"></script>
    <!--Forms - Wizard js-->
    <script src="{{ asset('bower_components/jquery.cookie/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('bower_components/jquery.steps/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-validation/js/jquery.validate.js') }}"></script>
    <!-- Validation js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('asset/pages/form-validation/validate.js') }}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('bower_components/i18next/js/i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('asset/pages/forms-wizard-validation/form-wizard.js') }}"></script>

    <script src="{{ asset('asset/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    
    <script type="text/javascript" src=" {{asset('bower_components/pnotify/js/pnotify.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/pages/pnotify/notify.js ')}}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>


<style>
    .table-wrapper {
        max-height: 550px; /* Set the desired height for the table */
        overflow: auto;
    }
</style>
</body>

</html>
