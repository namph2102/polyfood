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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../grid/grid.css">
    <link rel="stylesheet" href="../css/sanpham.css">
    <link rel="stylesheet" href="../css/paymoney.css">
    <link rel="stylesheet" href="../css/lienhe.css">
    <!--Title Web site-->
    <title>Liên hê</title>
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
                    href="../html/sanpham.html">Liên hệ </a>
            </div>
        </div>
        <!--Tiêu đề cho trang-->
        <div class="direce_page_heading ">
            <h1>Liên Hệ</h1>
        </div>
        <!--End Tiêu đề cho trang-->
    </section>
    <!--End Điều hướng của trang-->

    <div class="product_items_special">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container_paymoney">
            <div class="grid wide">
                <form class="needs-validation" name="frmthanhtoan">
                    <input type="hidden" name="kh_tendangnhap" value="">
                    <div class="row container_paymoney_ifm">
                        <div class="l-6 m-6 c-12">
                            <div class="container_paymoney_ifm_header">
                                <h4 class="container_paymoney_ifm_header-head">Gửi tin nhắn cho chúng tôi</h4>
                                <h5 class="container_paymoney_ifm_header-body">Bạn đã đăng ký chưa? Bấm vào đây để
                                    <strong><a href="k#">Đăng Kí</a></strong>
                                </h5>
                            </div>
                            <aside class="row">
                                <div class="box_message l-12 m-12 c-12">
                                    <fieldset class="">
                                        <legend>Họ tên</legend>
                                        <input required type="text" placeholder="Nhập họ và tên...."
                                            class="form-control" name="kh_ten" id="kh_ten" value="">
                                    </fieldset>
                                    <span class="meassage" for="kh_ten"></span>
                                </div>
                                <div class="box_message l-12 m-12 c-12">
                                    <fieldset class="">
                                        <legend>Email</legend>
                                        <input required type="email" placeholder="Nhập email...." class="form-control"
                                            name="kh_email" id="kh_email" value="">
                                    </fieldset>
                                    <span class="meassage" for="kh_ten"></span>
                                </div>
                                <div class="box_message l-12 m-12 c-12">
                                    <fieldset class="">
                                        <legend>Số Điện Thoại</legend>
                                        <input required type="text" placeholder="Nhập số điện thoại...."
                                            class="form-control" name="kh_phone" id="kh_phone" value="">
                                    </fieldset>
                                    <span class="meassage" for="kh_ten"></span>
                                </div>
                                <div class="textarea_container l-12 m-12 c-12 ">
                                    <fieldset class="">
                                        <legend>Nội Dung Liên Hệ</legend>
                                        <textarea required name="content" id="" rows="10" placeholder="Nội Dung...."></textarea>
                                    </fieldset>
                                    <span class="meassage" for="kh_ten"></span>
                                </div>


                            </aside>
                            <button class="btn btn-success l-3" type="submit" name="btnDatHang">Gửi liên hệ</button>
                        </div>

                        <div class="l-6 m-6 c-0 contact">
                           						
                                <div class="item  lienhe_container">		
                                    <div class="lienhe_container_item">
                                        <i class="fa fa-map-marker"></i> 
                                        <div class="info">
                                            <label>Địa chỉ liên hệ</label>
                                            200/34 C12 Tô Ký, Phường Đông Hưng Thuận, Quận 12, Tp.HCM
                                        </div>
                                    </div>
                                    
                                    <div class="lienhe_container_item">
                                        <i class="fa fa-phone"></i> 
                                        <div class="info">
                                            <label>Số điện thoại</label>
                                            <a href="tel:0877669990">0877 669 990</a>
                                            <p>Thứ 2 - Chủ nhật: 9:00 - 18:00</p>
                                        </div>
                                    </div>
                                    
                                                                
                                    <div class="lienhe_container_item"><i class="fa fa-envelope"></i> 
                                        <div class="info">
                                            <label>Email</label>
                                            <a href="mailto:namph2102@gmail.com">namph2102@gmail.com
    
                                            </a>
                                        </div>
                                    </div>																			
                                    
                                </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div style="margin:20px 12px;">
            <iframe style="width:100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15674.135174448746!2d106.64092014682515!3d10.84694525159291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529a2a4989fc9%3A0xda4b1890aef14087!2zUmF1IEPhu6cgUXXhuqMtVHLDoWkgQ8OieSBOaOG6rXAgS2jhuql1IEdPTEQgRlJFU0ggR8OyIFbhuqVw!5e0!3m2!1svi!2s!4v1663568789118!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                        <b><a style="text-decoration: none; color:rgba(255,255,255,0.8)" href="tel:0877669990">0877 669 990</a></b>
                        <br />
                        <i class="fa-solid fa-envelope"></i>
                        <b><a style="text-decoration: none; color:rgba(255,255,255,0.8)" href="mailto:namph2102@gmail.com">namph2102@gmail.com</a></b>
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
    <script src="../js/lienhe.js"></script>
</body>

</html>