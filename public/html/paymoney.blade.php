<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../css/style.css" >
    <link rel="stylesheet" href="../grid/grid.css">
    <link rel="stylesheet" href="../css/sanpham.css" >
    <link rel="stylesheet" href="../css/paymoney.css" >
    <!--Title Web site-->
    <title>Thanh Toán</title>
</head>

<body>
    <!-- header -->
    <header id="headmenu_fixed">
        <div class="grid wide">
            <div class="nav__content--sub row">
                <ul class="head_nav nav_left l-6 m-6 c-0">
                    <li class="email_address"><a href="mailto:namph2102@gmail.com"><i
                                class="fa-regular fa-envelope"></i>namph2102@gmail.com</a>
                        <div class="email_address_sub">
                            <p>namph2102@gmail.com</p>
                        </div>
                    </li>
                    <li class="phone_address"><a href="tel:0877669990"><i class="fa-solid fa-phone"></i> 0877 669
                            990</a>
                        <div class="phone_address_sub">
                            <p>0877 669 990</p>
                        </div>
                    </li>
                </ul>
                <ul class="head_nav nav_right l-6 m-6 c-12">
                    <li><a href="#" class="link_form">Đăng nhập/</a><a href="#" class="link_form">Đăng kí</a></li>
                    <li class="cart_main"><a href="#">Giỏ hàng/ <strong class="head_total">265,000đ</strong> <i
                                class="fa-solid fa-bag-shopping"></i></a>
                        <div class="cart_total_amount">
                            <p>3</p>
                        </div>
                        <div class="cart_sub_hover text-center">
                            <strong class="text-center cart_header">Giỏ Hàng</strong>
                            <div class="cart_emtpy">
                                <img src="https://www.clipartmax.com/png/full/420-4202091_shopping-cart-empty-shopping-cart-icon-shopping-cart.png"
                                    alt="">
                                <b>Chưa có sản phẩm nào trong giỏ hàng</b>
                            </div>
                            <div class="cart_sub_list-box">
                                <!-- <div class="cart_box">
                                    <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/ca_basa_huu_co_binca_cat_lat_master-300x300.jpg"
                                        alt="" />
                                    <div class="cart_box-des">
                                        <p class="cart_box-des-name">Sầuga riêng sạch nha sach dep thơm ngon nha</p>
                                        <p class="cart_box-des-body">
                                            <span class="cart_box-amount"><button
                                                    class="btn_decreate btn_chagne_cart"><i
                                                        class="fa-solid fa-minus"></i></button> 1<button
                                                    class="btn_create btn_chagne_cart"><i
                                                        class="fa-solid fa-plus"></i></button> </span>
                                            <span class="cart_box-price">235,352 đ</span>
                                        </p>
                                    </div>
                                    <div class="close_item"><i class="fa-regular fa-circle-xmark"></i></div>
                                </div> -->
                            </div>
                            <div class="total_sub">
                                <b>Tổng Phụ:</b> <strong>500,600 đ</strong>
                            </div>
                            <div class="btn_cart_list">
                                <button class="btn"><a href="#">xem giỏ hàng</a> </button>
                                <button class="btn btn_payment"><a href="#">thanh toán</a></button>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

            <div class="row nav_menu_main">
                <!-- menu table mobie -->
                <div class="show_menu hide">
                    <i class="fa-solid fa-bars menu"></i>
                    <div class="nav_mobile">
                        <ul class="nav_main ">
                            <li><a href="">Trang Chủ</a></li>
                            <li><a href="">Giới Thiệu</a></li>
                            <li class="sub_menu"><a href="#!">Sản Phẩm<i class="fa-solid fa-chevron-down"></i></a>
                                <ul class="sub_menu_products">
                                    <li><a href="../html/sanpham.html">Rau củ</a></li>
                                    <li><a href="">Hải sản</a></li>
                                    <li><a href="">Trái cây</a></li>
                                    <li><a href="">Đồ uống</a></li>
                                    <li><a href="">Thịt trứng</a></li>
                                </ul>
                            </li>
                            <li><a href="">Kiến Thức</a></li>
                            <li><a href="">Liên Hệ</a></li>
                        </ul>
                        <br />
                        <button class="btn btn-success"><a href="">Đăng kí</a></button>
                        <button class="btn btn-danger"><a href="">Đăng nhập</a></button>
                    </div>
                </div>
                <!--end  menu table mobie -->
                <div class="head_logo l-3 m-3 c-7">
                    <div class="logo_container">
                        <img src="../img/logoShop.png" alt="" />
                        <b class="logo_brand"><strong>Yumy</strong>Fresh</b>
                    </div>
                </div>
                <ul class="nav_main hide_of_table l-7 m-6 c-0">
                    <li><a href="">Trang Chủ</a></li>
                    <li><a href="">Giới Thiệu</a></li>
                    <li class="sub_menu"><a href="">Sản Phẩm<i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="sub_menu_products">
                            <li><a href="../html/sanpham.html">Rau củ</a></li>
                            <li><a href="">Hải sản</a></li>
                            <li><a href="">Trái cây</a></li>
                            <li><a href="">Đồ uống</a></li>
                            <li><a href="">Thịt trứng</a></li>
                        </ul>
                    </li>
                    <li><a href="">Kiến Thức</a></li>
                    <li><a href="">Liên Hệ</a></li>
                </ul>
                <div class="head_search l-2 m-3 c-3">
                    <div class="seach_item">
                        <input type="text" name="search" placeholder="Tìm kiếm ..."><i
                            class="fa-solid fa-magnifying-glass"></i>
                        <div class="seach_item_list hide">
                            <a href="#" class="seach_item_list-box">
                                <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                    alt="">
                                <div class="seach_item_list-box_des">
                                    <p class="seach_item_list-box_des-name">
                                        Bông bưởi hihihi đepq ua nha hahaha
                                    </p>
                                    <p class="seach_item_list-box_des-price">
                                        <span class="item_list-box_des-price">123,126,354 đ</span> <del>135,245đ</del>
                                    </p>
                                </div>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <!--Điều hướng của trang-->
    <section class="grid wide ">
        <div class="product_items_directional ">
            <div class="directional_head">
                <a href="../html/home.html">Trang chủ </a><i class="fa-solid fa-angle-right"></i> <a
                    href="../html/sanpham.html">giỏ hàng </a><i class="fa-solid fa-angle-right"></i><a href="">thanh
                    toán</a>
            </div>
        </div>
        <!--Tiêu đề cho trang-->
        <div class="direce_page_heading ">
            <h1>Thanh Toán</h1>
        </div>
        <!--End Tiêu đề cho trang-->
    </section>
    <!--End Điều hướng của trang-->


    <div class="product_items_special">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container_paymoney">
            <div class="grid wide">
                <form class="needs-validation" name="frmthanhtoan" >
                    <input type="hidden" name="kh_tendangnhap" value="dnpcuong">

                    <div class="text-center">
                        <h2>Lưu ý</h2>
                        <em class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.
                        </em>
                    </div>

                    <div class="row container_paymoney_ifm">
                        <div class="l-8 m-8 c-12">
                            <div class="container_paymoney_ifm_header">
                                <h4 class="container_paymoney_ifm_header-head">Thông tin khách hàng</h4>
                                <h5 class="container_paymoney_ifm_header-body">Bạn đã đăng ký chưa? Bấm vào đây để
                                    <strong><a href="k#">Đăng Kí</a></strong></h5>
                            </div>
                            <aside class="row">
                                <div class="box_message l-12 m-12 c-12">
                                    <fieldset class="">
                                        <legend>Họ tên</legend>
                                        <input required type="text" placeholder="Nhập họ và tên...." class="form-control" name="kh_ten" id="kh_ten"
                                            value="">
                                    </fieldset>
                                    <span class="meassage" for="kh_ten"></span>
                                </div>
                                <div class="box_message l-7 m-7 c-6">
                                    <fieldset class="">
                                        <legend>Email</legend>
                                        <input required type="email" placeholder="Nhập email...." class="form-control" name="kh_email" id="kh_email"
                                            value="">
                                    </fieldset>
                                    <span class="meassage" for="kh_ten"></span>
                                </div>
                                <div class="box_message l-4 m-4 c-6 ">
                                    <fieldset class="">
                                        <legend>Số Điện Thoại</legend>
                                        <input required type="text" placeholder="Nhập số điện thoại...." class="form-control" name="kh_phone" id="kh_phone"
                                            value="">
                                    </fieldset>
                                    <span class="meassage" for="kh_ten"></span>
                                </div>
                                <div class="box_message l-12 m-12 c-12">
                                    <fieldset class="">
                                        <legend>địa chỉ</legend>
                                        <input required type="text" placeholder="Nhập số nhà đường...." class="form-control position_diachi" name="kh_address" id="kh_address"
                                            value="">
                                    </fieldset>
                                    <span class="meassage" for="kh_ten"></span>
                                </div>  
                                                          
                                <div class="l-4 m-4 c-6 ">
                                    <fieldset class="">
                                        <legend>Tỉnh /Thành phố</legend>
                                        <select required name="" id="address_tinh">
                                            <option value="">Tỉnh /Thành phố</option>
                                        </select>
                                        <input type="hidden" class="position_tinh" name="kh_address_tinh" value="">      
                                    </fieldset>
                                    <span class="meassage"></span>
                                </div>
                                <div class="l-4 m-4 c-6 box_padding_aside">
                                    <fieldset class="">
                                        <legend>Huyện /Quận</legend>
                                        <select required name="" id="address_huyen">
                                            <option value="">Quận / Huyện</option>
                    
                                        </select> 
                                        <input type="hidden"class="position_huyen" name="kh_address_huyen" value="">                                                                         
                                    </fieldset>
                                    <span class="meassage"></span>
                                </div>
                                <div class="l-4 m-4 c-6 ">
                                    <fieldset class="">
                                        <legend>Xã /Thị Trấn</legend>
                                        <select required name="" id="address_xa">
                                            <option value="">Xã /Thị Trấn</option>
                                          
                                        </select>
                                        <input type="hidden"class="position_xa" name="kh_address_xa" value="">
                                    </fieldset>
                                    <span class="meassage"></span>
                                </div>
                                <!-- Tọa độ vị trí , nơi ở của customer-->
                                <input type="hidden" class="position_latitude" name="latitude" value="0" >   
                                <input type="hidden" class="position_longitude" name="longitude" value="0"> 
                                <input type="hidden" class="total_ship" name="total_ship" value="0" >   
                                <input type="hidden" class="total_vat" name="total_vat" value="0"> 
                                <input type="hidden" class="total_paymoney" name="total_paymoney" value="0">
                                 <!--end  Tọa độ vị trí , nơi ở của customer-->
                            </aside>
                            <article>
                                <h4 class="container_paymoney_ifm_header-head">Hình thức thanh toán</h4>
                                <div class="l-12 m-12 c-12 ">
                                    <div class="custom-control custom-radio">
                                        <input id="httt-1" name="httt_ma" class="httt_ma httt_ma_tienmat" type="radio" class="custom-control-input"
                                            required="" value="1">
                                        <label class="custom-control-label" for="httt-1">Tiền mặt</label>
                                        <div class="container_ifm_howtopay hidden">
                                            <span>
                                                <Address>200/34 C12 Tô Ký, Phường Đông Hưng Thuận, Quận 12, Tp.HCM</Address></span>
                                                
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="httt-2" name="httt_ma" class="httt_ma"  type="radio" class="custom-control-input"
                                            required="" value="2">
                                        <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                                        <div class="container_ifm_howtopay hidden">
                                            <span>Ngân hàng Aribank Chi nhánh Đại Dương</span><br>
                                            <span>Tên: Phạm Hoài Nam</span><br>
                                            <span>STK: 5009205143321</span>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="httt-3" name="httt_ma" class="httt_ma" type="radio" class="custom-control-input"
                                            required="" value="3">
                                        <label class="custom-control-label" for="httt-3">Ship CODE</label>
                                        <div class="container_ifm_howtopay ship_code_chose hidden">
                                           <span class="address_ship">Thành phố hồ chí minh</span>:
                                           <span><em class="price_ship_address">0 đ</em></span>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <button class="btn btn-success" type="submit" name="btnDatHang">Đặt
                                    hàng</button>
                            </article>
                        </div>


                        <div class="l-4 m-4 c-12 subprice-price">
                            <h4 class="subprice-price_container">
                                <div class="text-muted container_paymoney_ifm_header-head">Giỏ hàng</div>
                                <div class="badge badge-secondary badge-pill">2</div>
                            </h4>
                            <ul class="list-group ul_container">
                                <input type="hidden" name="sanphamgiohang[1][sp_ma]" value="2">
                                <input type="hidden" name="sanphamgiohang[1][gia]" value="11800000.00">
                                <input type="hidden" name="sanphamgiohang[1][soluong]" value="2">

                                <li class="list-group-item">
                                    <div class="l-8 m-6 c-6">
                                        <h6 >Apple Ipad 4 Wifi 16GB adas asdasd as asd asdasasdasd</h6>
                                        <small>11800000 x 2</small>
                                    </div>
                                    <span class="total_item_paymoney">23600000</span>
                                </li>
                            </ul>


                            <div class="input-group_container">
                                <div class="input-group_total_money-pay">                                
                                    <div class="input-group_total_money-pay_head subtotal_code">
                                            Tạm Tính
                                    </div>
                                   <div class="input-group_total_money-pay-body subtotal_code_value">
                                      0 đ
                                   </div>
                                </div>
                                <div class="input-group_total_money-pay">                                
                                    <div class="input-group_total_money-pay_head ship_code">
                                            SHIP CODE
                                    </div>
                                   <div class="input-group_total_money-pay-body ship_code_value">
                                      0 đ
                                   </div>
                                </div>
                                <div class="input-group_total_money-pay">                                
                                    <div class="input-group_total_money-pay_head vat_code">
                                        VAT
                                    </div>
                                   <div class="input-group_total_money-pay-body vat_value">
                                         10 %
                                   </div>
                                </div>
                                <div class="input-group_total_money-pay">
                                    <div class="input-group_total_money-pay_head ">
                                        Thành Tiền
                                    </div>
                                   <div class="input-group_total_money-pay-body total_value">
                                       125,123 đ
                                   </div>
                                </div>
                    
                               
                            </div>
                            <div class="input-group_total_money-pay row">
                                <button type="submit" class="btn btn-danger l-8 m-12 c-12">Xác nhận</button>
                                <button type="submit" class="btn btn-teal l-8 m-12 c-12"><a href="../html/bag.html">Xem Giỏ Hàng</a></button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End block content -->
    </div>

    <!-- footer -->
    <footer>
        <div class="grid wide">
            <div class="footer_container">
                <div class="footer-list_address l-3 m-6 c-12">
                    <div class="logo_container">
                        <img src="../img/logoShop.png" alt="">
                        <b class="logo_brand"><strong>Yumy</strong>Fresh</b>
                    </div>
                    <p class="list_address-shop">
                        <i class="fa-solid fa-location-dot"></i>
                        <b>200/34 C12 Tô Ký, Phường Đông Hưng Thuận, Quận 12, Tp.HCM</b>
                        <br />
                        <i class="fa-solid fa-phone"></i>
                        <b>0877 669 990</b>
                        <br />
                        <i class="fa-solid fa-envelope"></i>
                        <b>namph2102@gmail.com</b>
                        <br />
                        <i class="fa-brands fa-skype"></i>
                        <b>namph2102</b>
                    </p>
                </div>
                <div class="footer-list_catetory l-6 m-6 c-12">
                    <div class="list_catetory-products l-4 m-6 c-6">
                        <h2>SẢN PHẨM</h2>
                        <ul>
                            <li><a href="../html/sanpham.html">Rau củ</a></li>
                            <li><a href="">Hải sản</a></li>
                            <li><a href="">Trái cây</a></li>
                            <li><a href="">Đồ uống</a></li>
                            <li><a href="">Thịt trứng</a></li>
                        </ul>
                    </div>
                    <div class="list_catetory-products l-4 m-6 c-6">
                        <h2>DANH MỤC</h2>
                        <ul>
                            <li><a class="show" href="#headbanner_fixed">Trang chủ</a></li>
                            <li><a href="">Giới thiệu</a></li>
                            <li><a href="">Cửa hàng</a></li>
                            <li><a href="">Kiến thức</a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="list_catetory-products l-4 m-0 c-0">
                        <h2>DỊCH VỤ</h2>
                        <ul>
                            <li><a href="">Rau củ</a></li>
                            <li><a href="">Hải sản</a></li>
                            <li><a href="">Trái cây</a></li>
                            <li><a href="">Đồ uống</a></li>
                            <li><a href="">Thịt trứng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="list_catetory-products  footer-form_contact l-3 m-4 c-12">
                    <h2>ĐĂNG KÝ</h2>
                    <p class="form_contact-des">Đăng ký để nhận được được thông tin mới nhất từ chúng tôi.</p>
                    <div class="input_contact">
                        <input type="email" name="emailcontact" id="emailcontact" placeholder="Email..." /><i
                            class="fa-solid fa-paper-plane"></i>
                    </div>
                    <ul class="footer_list_social">
                        <li><a href="#!" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#!" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#!" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#!" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Copyright_footer">
            <p>© Bản quyền thuộc về . Thiết kế website <strong><em>HoaiNam Media</em></strong> </p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../js/home.js"></script>
    <script src="../js/paymoney.js"></script>
</body>

</html>