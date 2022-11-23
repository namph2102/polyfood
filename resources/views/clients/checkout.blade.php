<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('grid/grid.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/paymoney.css')}}">
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>
      Hóa Đơn Số - {{$maThanhToan}}
    </title>
</head>

<body>
    <div class="checkout_product">
        <div class="grid wide">
            <div class="box_container_checkout">
                <div class="checkout_product_box l-6 m-6 c-12">
                    <h1 style="padding: 0 8px;" class="checkout_product_box-brand">
                        Poly Fresh
                    </h1>
                    <div class="checkout_product-check">
                        <i class="fa-regular fa-circle-check icon_check"></i>
                        <div class="checkout_product_heading">
                            <h2>Cảm ơn bạn đã đặt hàng</h2>
                            <p>Vui lòng kiểm tra lại toàn bộ thông tin đơn hàng <strong>#{{$maThanhToan}}</strong> của bạn  và bấm nút xác nhận đơn hàng
                              <br>
                                Vào Email: {{$email}} để Xác Nhận đơn Hàng bạn nhé tránh spam <strong style="color: red;font-size: 16px;">"Xin lỗi vì sự bất tiện này" </strong>
                               </p>
                        </div>

                    </div>

                    <div class="row" style="padding:0px 24px ;">
                        <div class="checkout_product_footer l-6 c-6 m-6">
                            <h2>Thông tin Khách Hàng</h2>
                            <p>
                                {{$fullname}}<br><br>
                                {{$email}} <br><br>
                                {{$phone}}<br><br>
                                {{$address}}
                            </p>
                        </div>
                        <div class="checkout_product_footer l-6 c-6 m-6">
                            <h2>Phương thức thanh toán</h2>
                            <p>
                              {{$PtThanhToan}}<br><br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="l-6 m-6 c-12 subprice-price">
                    <h4 class="subprice-price_container">
                        <div class="text-muted container_paymoney_ifm_header-head">Mã Hóa Đơn 
                            <code> #{{$maThanhToan}}</code><sup>0</sup></div>

                    </h4>
                    <ul class="list-group ul_container">
                        {{-- <li class="list-group-item">
                            <div class="list-group-item_flex l-8 m-6 c-6">
                                <img src="https://bizweb.dktcdn.net/thumb/medium/100/452/257/products/5ef3b295-5274-4b42-8c5a-689ace4b0ec0.jpg?v=1655898101000"
                                    alt="">
                                <div>
                                    <h6>Khoai Tây Hữu Cơ</h6>
                                    <small>36,000 đ x 1</small>
                                </div>
                            </div>
                            <span class="total_item_paymoney">36,000 đ</span>
                        </li> --}}
                    </ul>
                    <div class="total-group-item_flex ">
                       <h1>Tổng Tiền nhận hàng:</h1> <span class="paytoltol">{{$paymoney}}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="grid wide list_btns">
            <button class="btn btn-success continue_xacthuc"><a href="{{route('maildonhang')}}/{{$maThanhToan}}/{{$listSP}}">Xác Nhận Đơn Hàng</a></button>
            <button class="btn btn-primary continue_buy"><a href="{{route('product.sanpham')}}">Tiếp Tục Mua Hàng</a></button>
            <button onclick="window.print();" class="btn btn-danger"><a href="#!"><i class="fa-solid fa-print"></i> In</a></button>
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
</body>
<script>
    const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
     function getLocal() {
    if (localStorage.getItem('vegetable_bag')) {
        return JSON.parse(localStorage.getItem('vegetable_bag'));
    }
    return [];
}
function coverMoney(coin) {
    coin=Number(coin);
    let dollarUSLocale = Intl.NumberFormat('en-US');
    return `${dollarUSLocale.format(Math.round(coin))} đ`
}
$('.paytoltol').innerText=coverMoney($('.paytoltol').innerText);
let ves=getLocal();
if(ves.length>0){
    $('.container_paymoney_ifm_header-head sup').innerText=ves.length;
    let html=ves.map((item)=>{

        return `
        <li class="list-group-item">
                            <div class="list-group-item_flex l-8 m-6 c-6">
                                <img src="${item.img}"
                                    alt="${item.img}">
                                <div>
                                    <h6>${item.name}</h6>
                                    <small>${coverMoney(item.price)}  x ${item.amount}</small>
                                </div>
                            </div>
                            <span class="total_item_paymoney">${coverMoney(item.price*item.amount)}</span>
                        </li>
        `;
    }).join('');
    $('.ul_container').innerHTML=html;
   
}
else{

}
    let continue_buy=$('.continue_buy');
    let button_link=continue_buy.querySelector('a');
    let linka=button_link.getAttribute('href');
    button_link.setAttribute('href','#');
    continue_buy.onclick=function(){
        loading('Sản Phẩm sẽ show trong ít phút.....');
        setTimeout(()=>{
            location.assign(linka);
        },1000)
    };
    let continue_xacthuc=$('.continue_xacthuc');
    continue_xacthuc.onclick=function(){
        loading('Vui Lòng vào email để xác thực ...');
    }
    function loading(head='Đang Xử Lý...'){
    let loading=$('.loading') ;
    loading.classList.remove('hide');
    $('.loading_heading').innerText=head;
    setTimeout(()=>{
        loading.classList.add('hide');
        return true;
    },6000)
 
}
</script>
</html>