<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../grid/grid.css">
    <link rel="stylesheet" href="../css/sanpham.css">
    <link rel="stylesheet" href="../css/tintuc.css">
    <title>Tin Tức</title>
</head>
<body>
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

                            <!-- <a href="#" class="seach_item_list-box">
                                <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                    alt="">
                                <div class="seach_item_list-box_des">
                                    <p class="seach_item_list-box_des-name">
                                        Bông bưởi hihihi đepq ua nha hahaha
                                    </p>
                                    <p class="seach_item_list-box_des-price">
                                        <span class="item_list-box_des-price">126,354 đ</span> <del>135,245đ</del>
                                    </p>
                                </div>
                            </a> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!--Điều hướng của trang-->
    <section class="grid wide">
        <div class="product_items_directional">
            <div class="directional_head">
                <a href="../html/home.html">Trang chủ </a><i class="fa-solid fa-angle-right"></i><a href=""> Sản
                    phẩm</a>
            </div>
        </div>
    </section>
    <!--End Điều hướng của trang-->
    <div id="headbanner_fixed" class="headchange"> </div>
    <div class="product_items_special">
        <div class="grid wide">
            <div class="product_items_directional l-12 c-12 m-12">
                <div class="direce_page_heading">
                    <h1>Tin Tức</h1>
                </div>
            </div>
            <div class="product_list_container">
                <div class="product_list_menu_direction l-3 m-4 c-0">
                    <div class="catetory_menu">
                        <div class="catetory_menu_head">
                            <h2>Danh mục sản phẩm</h2>
                        </div>
                        <ul class="catetory_menu_body">
                            <li><a href="#">Rau củ</a></li>
                            <li><a href="#">Hải sản</a></li>
                            <li><a href="#">Trái Cây</a></li>
                            <li><a href="#">Đồ uống</a></li>
                            <li><a href="#">Thịt Trứng</a></li>
                        </ul>
                    </div>

                    <div class="catetory_menu">
                        <div class="catetory_menu_head">
                            <h2>Tin Tức Nổi Bật</h2>
                        </div>
                        <ul class="catetory_menu_body catetory_menu_body_list_top">
                            <li><a href="#">
                                    <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                        alt="">
                                    <div class="catetory_menu_body_top_item">
                                        <p class="tintuc_name_hot">
                                            Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                            Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                        </p>
                                        <div class="top_item_price">
                                            23/15/2022
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><a href="#">
                                <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                    alt="">
                                <div class="catetory_menu_body_top_item">
                                    <p class="tintuc_name_hot">
                                        Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                        Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                    </p>
                                    <div class="top_item_price">
                                        23/15/2022
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#">
                            <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                alt="">
                            <div class="catetory_menu_body_top_item">
                                <p class="tintuc_name_hot">
                                    Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                    Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                </p>
                                <div class="top_item_price">
                                    23/15/2022
                                </div>
                            </div>
                        </a>
                    </li>
                        </ul>
                    </div>

                </div>
                <div class=" l-9 m-8 c-12">
                  <h2 class="tintuc_heading">Tin tức <span> ( Có tất cả 8 bài viết )</span></h2>
                    <ul class="catetory_menu_body catetory_menu_body_list_top tintuc_item_container">
                        <li><a href="#">
                                <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                    alt="" class="l-3 m-4 c-5"/>
                                <div class="catetory_menu_body_top_item l-9 m-8 c-7">
                                    <p class="tintuc_name_hot_menu">
                                        Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                        Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                    </p>
                                    
                                    <div class="top_item_price">
                                        23/15/2022
                                    </div>
                                    <p class="tintuc_name_hot_des">
                                        Tự trồng rau trong thùng xốp tại nhà là sự lựa chọn của rất nhiều gia đình trong thành phố bởi phương pháp trồng rau đơn giản, dễ trồng, dễ quản lý, an toàn và tiện lợi. Nhưng người...
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li><a href="#">
                            <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                                alt="" class="l-3 m-4 c-5"/>
                            <div class="catetory_menu_body_top_item l-9 m-8 c-7">
                                <p class="tintuc_name_hot_menu">
                                    Kỹ thuật trồng rau sạch trong chậu xốp tại nhà đơn giản
                                   
                                </p>
                                
                                <div class="top_item_price">
                                    23/15/2022
                                </div>
                                <p class="tintuc_name_hot_des">
                                    Tự trồng rau trong thùng xốp tại nhà là sự lựa chọn của rất nhiều gia đình trong thành phố bởi phương pháp trồng rau đơn giản, dễ trồng, dễ quản lý, an toàn và tiện lợi. Nhưng người...
                                </p>
                            </div>
                        </a>
                    </li>
                
                    </ul>
                    <div class="page_list l-12 m-12 c-12 ">
                       <div class="page_list_container">
                        <a class="ative" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                       <a href="#"> <i class="fa fa-angle-right"></i></a>
                       </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="toast">
        <!-- <div class="toast_item active">
            <div class="toast_heading">
                <div class="toast_message">Sản phẩm đã thêm vào giỏ hàng</div>
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
            <figure>
                <img src="http://mauweb.monamedia.net/happytrade/wp-content/uploads/2019/05/upload_1d1797f33c5140e4a7742aa0470d77e5_master.jpg"
                    alt="">
                <div class="toat_ifm">
                    <figcaption>Bưởi da đỏ con cu bua nhat sever afaf faf</figcaption>
                    <a href="#">12,156 đ</a>
                </div>
            </figure>
        </div> -->
    </div>


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
                        <b><a style="text-decoration: none; color:rgba(255,255,255,0.8)" href="tel:0877669990">0877 669
                                990</a></b>
                        <br />
                        <i class="fa-solid fa-envelope"></i>
                        <b><a style="text-decoration: none; color:rgba(255,255,255,0.8)"
                                href="mailto:namph2102@gmail.com">namph2102@gmail.com</a></b>
                        <br />
                        <i class="fa-brands fa-skype"></i>
                        <b>namph2102</b>
                    </p>
                </div>
                <div class="footer-list_catetory l-6 m-6 c-12">
                    <div class="list_catetory-products l-4 m-6 c-6">
                        <h2>SẢN PHẨM</h2>
                        <ul>
                            <li><a href="">Rau củ</a></li>
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
    <script src="../js/home.js"></script>

</body>

</html>