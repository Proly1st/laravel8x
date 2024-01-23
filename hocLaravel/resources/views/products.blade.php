<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sản phẩm </title>
   
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

    <link rel="icon" href="{{ asset('asset/images/favicon.ico') }}" type="image/x-icon">
    
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('bower_components/bootstrap/css/bootstrap.min.css') }} ">
  
    <!-- jquery file upload Frame work -->
    <link href="{{ asset('/asset/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/asset/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/css/component.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/icon/icofont/css/icofont.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/icon/feather/css/feather.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/asset/css/jquery.mCustomScrollbar.css') }}">
      <!-- notify js Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/pnotify/css/pnotify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/pnotify/css/pnotify.brighttheme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/pages/pnotify/notify.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <!-- css tự viết -->
    <link href="{{ asset('asset/styleproduct.css') }}" rel="stylesheet">

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
                                        <h4>Product List</h4>
                                        <button><a href="{{route('Categories')}}">Categories</a></button>
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
                                        <li class="breadcrumb-item"><a href="#!">E-Commerce</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Product List</a>
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
                                        <!-- Page body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Product list card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Product List</h5>
                                            <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13"> <i class="icofont icofont-plus m-r-5"></i> Add Product
                                                </button>
                                        </div>
                                        
                                        <div class="card-block">
                                            <div class="table-responsive">
                                                <div class="table-content">
                                                    <div class="project-table">
                                                        <table id="e-product-list" class="table table-striped dt-responsive nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>Image</th>
                                                                    <th>Product Name</th>
                                                                    <th>Inventory</th>
                                                                    <th>Description</th>
                                                                    <th>Status</th>
                                                                    <th>Update Status</th>
                                                                    <th>Price</th>                                                                               <th>Promotion</th>
                                                                    <th>Promotion_type</th>
                                                                    <th>Action</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product list card end -->
                                </div>
                            </div>
                            <!-- Add Contact Start Model start-->
                            <div class="md-modal md-effect-13 addcontact" id="modal-13">
                                <div class="md-content">
                                    <h3 class="f-26">Add Product</h3>
                                    
                                    <div>
                                        <div class="input-group">
                                        <input id="imageFile" type="file" class="form-control" accept="image/*" name="image">
                                        </div>
                                        <div class="input-group">
                                           
                                            <input id="name-product" type="text" class="form-control pname" placeholder="Prodcut Name">
                                        </div>
                                        <div class="input-group">
                                           
                                            <input id="inventory-product" type="text" class="form-control pamount" placeholder="Inventory">
                                        </div>
                                        <div class="input-group">
                                          
                                            <input id="descript-product" type="text" class="form-control pamount" placeholder="Description">
                                        </div>
                                        
                                        <div class="input-group">
                                            <select id="select-status" class="form-control stock">
                                                <option value="">---- Status ----</option>
                                                <option value="0">Tạm ngưng</option>
                                                <option value="1">Đang hoạt động</option>
                                                <option value="-1">Đã bị xóa</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                           
                                            <input id="price-product" type="text" class="form-control pamount" placeholder="Price">
                                        </div>
                                        <div class="input-group"> 
                                        
                                            <select id="select-category" class="form-control stock">
                                                <option value="">---- Categories ----</option>
                                               
                                                
                                            </select>
                                                    
                                    
                                        </div>
                                        <div class="text-center">
                                            <button id="save-product"  type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block save_btn">Save</button>
                                                
                                            <button type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block close_btn">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md-overlay"></div>
                            <!-- Add Contact Ends Model end-->
                            <!-- start modal update product -->
                                
                                <div id="modal-container" class="modala">
                                    <div class="md-content">
                                        <h3 class="f-26">Edit Category</h3>
                                        <div>
                                            <!-- <div class="input-group">
                                            <input id="editImageFile" type="file" class="form-control" accept="image/*" name="image">
                                            </div> -->
                                            <div class="input-group">
                                                <span class="input-group-addon">Name</i></span>
                                                <input id="editname-product" type="text" class="form-control pname" placeholder="Prodcut Name">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">Inventory</span>
                                                <input id="editinventory-product" type="text" class="form-control pamount" placeholder="Inventory">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">Description</i></span>
                                                <input id="editdescript-product" type="text" class="form-control pamount" placeholder="Description">
                                            </div>
                                            
                                            <div class="input-group">
                                                <select id="editselect-status" class="form-control stock">
                                                    <option value="">---- Status ----</option>
                                                    <option value="0">Tạm ngưng</option>
                                                    <option value="1">Đang hoạt động</option>
                                                    <option value="-1">Đã bị xóa</option>
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">Price</span>
                                                <input id="editprice-product" type="text" class="form-control pamount" placeholder="Price">
                                            </div>
                                           
                                            <div class="text-center">
                                                <button id="saveEdit" type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 d-inline-block save_btn">Save</button>
                                                <button id="loseEdit" type="button" class="btn btn-primary waves-effect m-r-20 f-w-600 md-close d-inline-block close_btn"  onclick="hideModal()">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- end modal update product-->

                        </div>
                        <!-- Page body end -->
                    </div>
                </div>
                <!-- Main-body end -->
                        </div>
    

  <!-- js tự viết -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('jsProduct.js') }}"></script>

    <script type="text/javascript" src=" {{asset('bower_components/pnotify/js/pnotify.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/pages/pnotify/notify.js ')}}"></script>
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
  
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

    <!-- jquery file upload js -->
    <script src="{{ asset('asset/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script src="{{ asset('asset/pages/filer/custom-filer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/pages/filer/jquery.fileuploads.init.js') }}" type="text/javascript"></script>
    <!-- Model animation js -->
    <script src="{{ asset('asset/js/classie.js') }}"></script>
    <script src="{{ asset('asset/js/modalEffects.js') }}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('/bower_components/i18next/js/i18next.min.js') }}"></script>
    <script src="{{ asset('asset/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

<!-- Custom js -->
<script type="text/javascript" src="{{ asset('/asset/js/script.js') }}"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
