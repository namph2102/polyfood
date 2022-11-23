<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('grid/grid.css')}}">
        <link rel="stylesheet" href="{{asset('css/sanpham.css')}}">
        <link rel="stylesheet" href="{{asset('css/profile.css')}}">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        @yield('css')
    <title>Poly Food @yield('title')</title>
</head>

<body>
    <header id="headmenu_fixed">
        <div class="grid wide">
            <div class="nav__content--sub row">
                <ul class="head_nav nav_left l-6 m-6 c-0">
                    <li class="email_address"><a href="mailto:polyfreshh@gmail.com"><i
                                class="fa-regular fa-envelope"></i>polyfreshh@gmail.com</a>
                        <div class="email_address_sub">
                            <p>polyfreshh@gmail.com</p>
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
                    @php
                $auther='';
                if(!empty($_COOKIE["IDUSER"])){
                    $auther=DB::table('users')->where('username',$_COOKIE['IDUSER'])->get();
                 if(count($auther)==1){
                 $auther=$auther;
                 }
                 else{
                     $auther='';
                    }
                  }
                @endphp
                   @if (!empty($auther))
                   <li class="box_avata_user profile">
                       <img class="user_avata" src="{{$auther[0]->avata}}" alt="{{$auther[0]->avata}}">
                       <a href="{{route('account.profile')}}"  class="box_avata_user_margin">{{$auther[0]->fullname}} /</a>
                        <a href="{{route('account.logout')}}/{{$auther[0]->username}}" class="link_form">Đăng Xuất</a>
                        @if($auther[0]->level=='admin' || $auther[0]->level=='manager')
                        <a href="{{route('admin.show')}}" class="link_form"> > Quản trị Website</a>
                        @endif
                        <a style="color: white;" href="{{route('account.profile')}}" class="profile_sub">
                          <p>Profile: {{$auther[0]->fullname}} </p>
                      </a>
                   </li>        
                     
              @endif
                @if (empty($auther))
                 <li><a href="{{route('account.login')}}" class="link_form">Đăng nhập/</a><a href="{{route('account.regester')}}" class="link_form">Đăng kí</a></li>
                @endif
                    <li class="cart_main"><a href="{{route('product.giohang')}}">Giỏ hàng/ <strong class="head_total">265,000đ</strong> <i
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
                               
                            </div>
                            <div class="total_sub">
                                <b>Tổng Phụ:</b> <strong>0 đ</strong>
                            </div>
                            <div class="btn_cart_list">
                                <button class="btn"><a href="{{route('product.giohang')}}">xem giỏ hàng</a> </button>
                                <button class="btn btn_payment"><a href="{{route('product.thanhtoan')}}">thanh toán</a></button>
                            </div>
                        </div> 
                         {{-- <li><a href="../html/sanpham.html"> --}}
                    </li>

                </ul>
            </div>

            <div class="row nav_menu_main">
                <!-- menu table mobie -->
                <div class="show_menu hide">
                    <i class="fa-solid fa-bars menu"></i>
                    <div class="nav_mobile">
                        <ul class="nav_main ">
                            <li><a href="{{route('product.home')}}">Trang Chủ</a></li>
                            <li><a href="{{route('product.gioithieu')}}">Giới Thiệu</a></li>
                            <li class="sub_menu"><a href="#!">Sản Phẩm<i class="fa-solid fa-chevron-down"></i></a>
                                <ul class="sub_menu_products">
                                    <li><a href="{{route('product.sanpham.tungloai')}}/raucu">Rau củ</a></li>
                                    <li><a href="{{route('product.sanpham.tungloai')}}/haisan">Hải sản</a></li>
                                    <li><a href="{{route('product.sanpham.tungloai')}}/traicay">Trái cây</a></li>
                                    <li><a href="{{route('product.sanpham.tungloai')}}/douong">Đồ uống</a></li>
                                    <li><a href="{{route('product.sanpham.tungloai')}}/thitrung">Thịt trứng</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('product.tintuc')}}">Tin Tức</a></li>
                            <li><a href="{{route('product.lienhe')}}">Liên Hệ</a></li>
                        </ul>
                        <br />
                        <button class="btn btn-success"><a href="{{route('account.regester')}}">Đăng kí</a></button>
                        <button class="btn btn-danger"><a href="{{route('account.login')}}">Đăng nhập</a></button>
                    </div>
                </div>
                <!--end  menu table mobie -->
                <a href="{{route('product.home')}}" style="cursor: pointer;text-decoration: none;" class="head_logo l-3 m-3 c-7">
                    <div class="logo_container">
                        <img src="/img/logoShop.png" alt="" />
                        <b class="logo_brand"><strong>Poly</strong>Fresh</b>
                    </div>
                </a>
                <ul class="nav_main hide_of_table l-7 m-6 c-0">
                    <li><a href="{{route('product.home')}}">Trang Chủ</a></li>
                    <li><a href="{{route('product.gioithieu')}}">Giới Thiệu</a></li>
                    <li class="sub_menu"><a href="#!">Sản Phẩm<i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="sub_menu_products" >
                            <li><a href="{{route('product.sanpham.tungloai')}}/raucu">Rau củ</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/haisan">Hải sản</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/traicay">Trái cây</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/douong">Đồ uống</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/thitrung">Thịt trứng</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('product.tintuc')}}">Tin Tức</a></li>
                    <li><a href="{{route('product.lienhe')}}">Liên Hệ</a></li>
                </ul>
                <div class="head_search l-2 m-3 c-3">
                    <div class="seach_item">
                        <input type="text" name="search" placeholder="Tìm kiếm ..."><i
                            class="fa-solid fa-magnifying-glass"></i>
                        <div class="seach_item_list hide">


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
                <a href="{{route('product.home')}}">Trang chủ </a><i class="fa-solid fa-angle-right"></i> @yield('directional')
            </div>
        </div>
        <div class="grid wide">
            
          <br>
          <div class="l-6  m-6 c-12 l-o-3 m-o-3">
             @yield('message')
          </div>
           
            
        </div>
    </section>
    <!--End Điều hướng của trang-->
    <div id="headbanner_fixed" class="headchange"> </div>

   
    <div class="product_items_special">
        <div class="grid wide">
            <div class="profile_container row">
                <div class="profile_container_menu l-3 m-6 c-12">
                    <div class="profile_logo">
                        <img src="{{$auther[0]->avata}}" alt="">
                        <div class="profile_logo-ifm">
                            <p>
                                <profile-fullname> {{$auther[0]->fullname}}</profile-fullname>
                            </p>

                            <p>
                                <profile-date>Ngày tạo : {{date("d/m/Y h:m:s", strtotime($auther[0]->created_at))}}</profile-date>
                            </p>
                        </div>
                    </div>
                    <nav>
                        <ul class="profile_menu">
                            <li><a href="{{route('account.profile')}}"><i class="fa-solid fa-user"></i>Hồ sơ</a></li>
                            <li><a href="{{route('account.donhang')}}"><i class="fa-solid fa-book"></i>Đơn Hàng</a></li>
                            <li><a href="{{route('account.changepassword')}}"><i class="fa-solid fa-key"></i>Đổi mật khẩu</a></li>
                        </ul>
                    </nav>
                </div>
              
                @yield('container')
            </div>
        </div>
    </div>
    


    <div class="toast">
    </div>
    <div class="modal hide">
        <div class="modal_container">
            <div class="modal_content">
                <div class="modal_content-head">
                    <img src="../img/welcome.png" alt="">
                    <h1>Chào Mừng Bạn</h1>
                    <i class="fa-solid fa-x btn_close"></i>
                </div>
                <div class="modal_content-container">
                    <h2 class="modal_content-header">Thông Báo</h2>
                    <p class="modal_content-des">
                       Quá Khách Chưa mua hàng
                    </p>
                </div>
                  <div class="modal_content-footer">
                    <button class="btn btn-danger">Close</button>
                  </div>
            </div>
        </div>  
    </div>
    <div class="loading hide">
        <h2 class="loading_heading">Chờ Trong Giây Lát ....</h2>
        <div class="rings">
            <div class="ring"></div>
            <div class="ring"></div>
            <div class="ring"></div>
        </div>
    </div>
    <audio class="clickmouse" src="../img/clickmouse.mp3" hidden></audio>
    <audio class="gophim" src="../img/gophim.mp3" hidden></audio>
    <footer>
        <div class="grid wide">
            <div class="footer_container">
                <div class="footer-list_address l-3 m-6 c-12">
                    <a href="{{route('product.home')}}" class="logo_container">
                        <img src="/img/logoShop.png" alt="">
                        <b class="logo_brand"><strong>Poly</strong>Fresh</b>
                    </a>
                    <p class="list_address-shop">
                        <i class="fa-solid fa-location-dot"></i>
                        <b>200/34 C12 Tô Ký, Phường Đông Hưng Thuận, Quận 12, Tp.HCM</b>
                        <br />
                        <i class="fa-solid fa-phone"></i>
                        <b><a style="text-decoration: none; color:rgba(255,255,255,0.8)" href="tel:0877669990">0877 669 990</a></b>
                        <br />
                        <i class="fa-solid fa-envelope"></i>
                        <b><a style="text-decoration: none; color:rgba(255,255,255,0.8)" href="mailto:polyfreshh@gmail.com">polyfreshh@gmail.com</a></b>
                        <br />
                        <i class="fa-brands fa-skype"></i>
                        <b>polyfreshh</b>
                    </p>
                </div>
                <div class="footer-list_catetory l-6 m-6 c-12">
                    <div class="list_catetory-products l-4 m-6 c-6">
                        <h2>SẢN PHẨM</h2>
                        <ul>
                            <li><a href="{{route('product.sanpham.tungloai')}}/raucu">Rau củ</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/haisan">Hải sản</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/traicay">Trái cây</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/douong">Đồ uống</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/thitrung">Thịt trứng</a></li>
                        </ul>
                    </div>
                    <div class="list_catetory-products l-4 m-6 c-6">
                        <h2>DANH MỤC</h2>
                        <ul>
                            <li><a class="show" href="#headbanner_fixed">Trang chủ</a></li>
                            <li><a href="{{route('product.gioithieu')}}">Giới thiệu</a></li>
                            <li><a href="{{route('product.sanpham')}}">Sản Phẩm</a></li>
                            <li><a href="{{route('product.tintuc')}}">Tin Tức</a></li>
                            <li><a href="{{route('product.lienhe')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="list_catetory-products l-4 m-0 c-0">
                        <h2>DỊCH VỤ</h2>
                        <ul>
                            <li><a href="{{route('product.sanpham.tungloai')}}/raucu">Rau củ</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/haisan">Hải sản</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/traicay">Trái cây</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/douong">Đồ uống</a></li>
                            <li><a href="{{route('product.sanpham.tungloai')}}/thitrung">Thịt trứng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="list_catetory-products  footer-form_contact l-3 m-4 c-12">
                    <h2>ĐĂNG KÝ</h2>
                    <p class="form_contact-des">Đăng ký để nhận được được thông tin mới nhất từ chúng tôi.</p>
                    <div class="input_contact" title="Gửi mail cho tôi">
                        <input type="email" name="emailcontact" id="emailcontact" placeholder="Email..." /><i
                            class="fa-solid fa-paper-plane"></i>
                    </div>
                    <ul class="footer_list_social">
                        <li title="Liên hê với chúng tôi"><a href="#!" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li title="Liên hê với chúng tôi"><a href="#!" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        <li title="Liên hê với chúng tôi"><a href="#!" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li title="Liên hê với chúng tôi"><a href="#!" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Copyright_footer">
            <p>© Bản quyền thuộc về . Thiết kế website <strong><em>HoaiNam Media</em></strong> </p>
        </div>
    </footer>
</body>
<script>
        
   let api = [
    {
        id: 'MSP1252',
        img: "https://bizweb.dktcdn.net/thumb/medium/100/452/257/products/2e77693a-e559-4277-aba7-bdb637dea129.jpg?v=1655898378000",
        name: 'Rau mơ ngon',
        price_sale: 20125,
        price_orgin: 30014,
        des: "Sản phẩm tươi ngon tốt cho sức khỏe",
        status: 1,
        kind: "MLH01",
    },
]
</script>
@php
$apiSanpham =DB::table('sanpham')->get();
$listapiSanpham=[];
foreach($apiSanpham as $item) {
$listapiSanpham[]=[
'id'=> $item->maSanPham,
'img'=> $item->imageSanPham,
'name'=> $item->tenSanPham,
'price_sale'=> $item->priceSale,
'price_orgin'=> $item->priceOrigin,
'des'=> $item->maLoaiHang,
'status'=> ($item->soLuong>0)?1:0,
'kind'=> $item->maLoaiHang,
];} 
$apiSanpham=json_encode($listapiSanpham);
@endphp

<script>
    api='<?php echo $apiSanpham; ?>';
    api=JSON.parse(api);
</script> 
<script>
     let $=document.querySelector.bind(document);
    let $$=document.querySelectorAll.bind(document);
     // css cho âm thanh
     document.addEventListener('click',function(){
            document.querySelector('.clickmouse').play();
         })
         document.addEventListener('keydown',function(){
            document.querySelector('.gophim').play();
            setTimeout(() => {
                document.querySelector('.gophim').pause();
            }, 300);
         })
          //end  css cho âm thanh
    function output_pay() {
    return false;
};
function loadproduct_paymoney() {
    return false;
};

function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
          result += characters.charAt(Math.floor(Math.random() * 
     charactersLength));
       }
       return result;
}
search_data(api);
function search_data(api) {
    if (!api) return false;
    let seach_item_list = $('.seach_item_list');
    let seach_input = $('.seach_item input[name="search"]');
    let html_search = api.map(function (item) {

        return `
            <img class="cart_emtpy_search hide" src="{{asset('img/noitem.png')}}"  alt="{{asset('img/noitem.png')}}" />
            <div  class="seach_item_list-box">
                <img src="${item.img}"
                                    alt="">
                <div class="seach_item_list-box_des">
                    <a href="{{route('product.gochitiet')}}/${makeid(6)}${item.id}-${makeid(10)}${item.status}-${makeid(6)}${item.kind}-${makeid(10)}" class="seach_item_list-box_des-name">
                        ${item.name}
                    </a>
                     <p class="seach_item_list-box_des-price">
                        <span class="item_list-box_des-price"> ${coverMoney(item.price_sale)}</span> <del> ${(item.price_orgin>item.price_sale) ? coverMoney(item.price_orgin):''}</del>
                    </p>
                </div>
            </div>
            `
    }).join('');
    seach_item_list.innerHTML = html_search;
    seach_input.addEventListener('input', function (e) {
        let a_seach_item_list = $$('.seach_item_list-box');
        let keywork = e.target.value;
        if (keywork) {
            let newlist
            seach_item_list.classList.remove('hide');
            for (let item of a_seach_item_list) {
                let name_item = item.querySelector('.seach_item_list-box_des-name').innerText;
                let price_item = item.querySelector('.item_list-box_des-price').innerText;
                name_item = String(name_item).toLowerCase();
                keywork = String(keywork).toLowerCase();
                price_item = String(price_item).toLowerCase();
                if (name_item.includes(keywork) || price_item.includes(keywork)) {
                    item.classList.remove('hide');

                }
                else {
                    item.classList.add('hide');

                }
                newlist = document.querySelector('.seach_item_list').innerText;
            }
            if (!newlist) {
                seach_item_list.querySelector('.cart_emtpy_search').classList.remove('hide');
            } else {
                seach_item_list.querySelector('.cart_emtpy_search').classList.add('hide');
            }
        }
        else {
            seach_item_list.classList.add('hide');

        }
    });
    document.onclick = function (e) {
        seach_input.value = '';
        seach_item_list.classList.add('hide');
    }
}
    function coverMoney(coin) {
    let dollarUSLocale = Intl.NumberFormat('en-US');
    return `${dollarUSLocale.format(Math.round(coin))} đ`
}
    let headmenu = $('#headmenu_fixed');
let bannerElement = $('.headchange');
if (headmenu && bannerElement) {
    window.onscroll = function (e) {
        let rectmenu = bannerElement.getClientRects()[0];
        if (rectmenu.top <= 0) {
            headmenu.classList.add('open_fixed_pc');
        }
        else {
            headmenu.classList.remove('open_fixed_pc');
        }
    }
}
    function getLocal() {
    if (localStorage.getItem('vegetable_bag')) {
        return JSON.parse(localStorage.getItem('vegetable_bag'));
    }
    return [];
}
function setLocal(item,soluong=1) {
    let vegetable_item_list = getLocal();
    if (vegetable_item_list) {
        let isAppear = vegetable_item_list.find(function (element) {
            return element.id === item.id;
        });
        if (isAppear) {
            for (let item of vegetable_item_list) {
                if (isAppear.id === item.id) {
                   item.amount+=Number(soluong);
                   
                    break;
                }
            }
        }
        else {
            vegetable_item_list.push(item);
        }

        localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list));
    }
    else {
        localStorage.setItem('vegetable_bag', JSON.stringify(item));
    }
}
function cart_bag(id, name, price, img, kind,amout=1) {
    let item = {
        'id': id,
        'name': name,
        'price': price,
        'img': img,
        'amount': amout,
        'kind': kind,
    };
    setLocal(item,amout);
    output_Bag_Heading();
}
    function creattoast(name = '', price = 0, img = '') {
    let toast_item = document.createElement('div');
    toast_item.className = 'toast_item';
    toast_item.innerHTML = `
    <div class="toast_heading">
    <div class="toast_message">Sản phẩm đã thêm vào giỏ hàng</div>
    <i class="fa-solid fa-circle-xmark"></i>
</div>
<figure>
    <img src="${img}"
        alt="">
    <div class="toat_ifm">
        <figcaption>${name}</figcaption>
        <a href="#">${coverMoney(price)} </a>
    </div>
</figure>
    `;

    setTimeout(function () {
        toast_item.classList.toggle('active');
        toast.appendChild(toast_item);
    }, 200)
    setTimeout(function () {
        toast_item.classList.toggle('active');
    }, 2000)
    setTimeout(function () {
        toast_item.remove();
    }, 4000)
}
function handPrice(number) {
    if (String(number).indexOf('đ')) {
        number = number.replaceAll('đ', '');
    }
    if (String(number).indexOf(',')) {
        number = number.replaceAll(',', '');
    }
    if (String(number).indexOf(' ')) {
        number = number.replaceAll(' ', '');
    }
    if (String(number).indexOf('%')) {
        number = number.replaceAll('%', '');
    }
    return Number(number);
}
output_Bag_Heading();
function output_Bag_Heading() {
    let bag_heading = getLocal();
    let container_heading = $('.cart_sub_list-box');
    let total = 0;
    let listbag_items = bag_heading.map(function (item) {
        total += item.price * item.amount;
        return `
            <a href="#" class="cart_box">
            <img src="${item.img}"
                alt="" />
            <div class="cart_box-des">
                <p class="cart_box-des-name">${item.name} - (${coverMoney(item.price)} )</p>
                <p class="cart_box-des-body">
                    <span class="cart_box-amount"><button
                            class="btn_decreate btn_chagne_cart"><i
                                class="fa-solid fa-minus"></i></button> <span>${item.amount}</span><button
                            class="btn_create btn_chagne_cart"><i
                                class="fa-solid fa-plus"></i></button> </span>
                    <span class="cart_box-price">${coverMoney(item.price * item.amount)}</span>
                </p>
                <input type="hidden" class="product_id" value="${item.id}">
                <input type="hidden" class="product_kind" value="${item.kind}">
            </div>
            <div class="close_item"><i class="fa-regular fa-circle-xmark"></i></div>
        </a>
            `;
    }).join('');
    //Cart_trống
    if (total == 0) {
        $('.cart_emtpy').classList.remove('hide');
        container_heading.innerHTML = '';
    }
    else {
        $('.cart_emtpy').classList.add('hide');

    }

    //-----------------------
    // output Sản phẩm 
    container_heading.innerHTML = listbag_items;
    // Số lượng sản phẩm
    let cart_total_amounts = $('.cart_total_amount p').innerText = bag_heading.length;
    // tổng giá trị sản phẩm
    let total_sub = $('.total_sub strong');
    total_sub.innerHTML = coverMoney(total);
document.querySelector('.cart_main .head_total').innerText=coverMoney(total);
    // sự kiện thêm sửa xóa thay đổi
    let cart_box_list = $$('.cart_sub_hover .cart_box');
    let list_btn_decreates = $$('.btn_decreate');
    let list_btn_creates = $$('.btn_create');
    let list_btn_close_bag = $$('.cart_box .close_item');
    hand_Event_Bag(list_btn_decreates, list_btn_creates, list_btn_close_bag);

    //funnc bên Giỏ Hàng
    if (output_pay()) {
        output_pay();
    }
    //funnc bên thahn toán 
    if (loadproduct_paymoney()) {
        loadproduct_paymoney();
    }
}
function hand_Event_Bag(list_btn_decreates, list_btn_creates, list_btn_close_bag, box_parent = '.cart_box', box_name = '.product_id') {
    let btn_decreates = list_btn_decreates;
    let btn_creates = list_btn_creates;
    let btn_close_bag = list_btn_close_bag;
    let vegetable_item_list = getLocal();
    // giảm số lượng
    btn_decreates.forEach((btn_dec) => {
        btn_dec.onclick = function () {
            if (this.closest(box_parent)) {
                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).value;
                for (let item in vegetable_item_list) {
                    if (nameItem === vegetable_item_list[item].id) {
                        vegetable_item_list[item].amount--;
                        if (vegetable_item_list[item].amount == 0) {
                            vegetable_item_list.splice(item, 1);
                        }
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
            }
        };
    });
    // tăng số lượng
    btn_creates.forEach((btn_cre) => {
        btn_cre.onclick = function () {
            if (this.closest(box_parent)) {
                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).value;
                for (let item of vegetable_item_list) {
                    if (nameItem === item.id) {
                        item.amount++;
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
            }
        };
    });
    // xóa
    btn_close_bag.forEach((btn_close) => {
        btn_close.onclick = function () {
            if (this.closest(box_parent)) {
                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).value;
                for (let item of vegetable_item_list) {
                    if (nameItem === item.id) {
                        vegetable_item_list.splice(item, 1);
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
            }
        };
    });
}
function loading(head='Đang Xử Lý...'){
    let loading=$('.loading') ;
    loading.classList.remove('hide');
    $('.loading_heading').innerText=head;
    setTimeout(()=>{
        loading.classList.add('hide');
        return true;
    },1500)
 
}
function modal(head,ifm,content,time=0){
    let modal=$('.modal') ;
    $('.btn_close').onclick=function(){
        modal.classList.add('hide');
    }
    $('.modal_content-footer button').onclick=function(){
        modal.classList.add('hide');
    }
    if(time!=0){
        setTimeout(() => {
        modal.classList.add('hide');
    }, time);
    }
    modal.classList.remove('hide');
    $('.modal_content-head h1').innerText=head;
    $('.modal_content-header').innerText=ifm;
    $('.modal_content-des').innerText=content;
}
</script>
@yield('jsvip')