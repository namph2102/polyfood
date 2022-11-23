@extends('layoutMaster.layoutProduct')
@section('meta')
<meta name="description" content=" {{$tbchitiet->moTa}}" />
<meta name="keywords" content="{{$tbchitiet->tenSanPham}}">
<meta name="author" content="PolyFresh">
<link rel="shortcut icon" href="{{$tbchitiet->imageSanPham}}" type="image/x-icon">
@endsection
@section('title')
- {{$tbchitiet->tenSanPham}}
@endsection

<style>
    .product_list_container {
        flex-direction: row-reverse;
    }

    .box_comment {
        border: 2px solid rgb(201, 204, 43);
        display: flex;
        align-items: center;
        border-radius: 8px;
    }

    #kh_ten {
        min-width: 135px;
        border-right: 1px solid rgb(214, 213, 213);
    }

    #kh_coment {
        font-size: 1.6rem;
        width: 100%;
        height: 50px;
        padding: 4px 12px;
        margin: 0 12px;
        letter-spacing: 1.5;
    }

    .box_comment input {
        border: none;
        outline: none;
    }

    .box_comment fieldset {
        border: none;
    }

    .btn_conment {
        width: 50px;
        height: 50px;
        margin-left: 5px;
        border-radius: 13px;
        color: #fff;
        cursor: pointer;
        font-weight: 700;
        border-bottom: 3px solid #151d25;
        background-color: #019500;
    }

    .box_star {
        display: flex;
        align-items: center;
        font-size: 1.6rem;
    }

    .box_star .star_color {
        clip-path: polygon(50% 0%, 61% 35%, 99% 36%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        width: 20px;
        height: 20px;
        background-color: rgb(247, 35, 35);
        cursor: pointer;
    }

    .container_comments {
        margin: 12px 0;
        overflow-y: scroll;
        height: 300px;
    }
    .container_paymoney fieldset{
        border: none;
        outline: none;
    }
</style>
@section('css')

<link rel="stylesheet" href="{{asset('css/paymoney.css')}}">
<link rel="stylesheet" href="{{asset('css/chitiet.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('directional')
<a href="{{route('product.sanpham')}}">Sản Phẩm</a><i class="fa-solid fa-angle-right"></i> <a>{{$tbchitiet->tenSanPham}}</a>
@endsection
@section('container')
@php
$auther='';
if(!empty($_COOKIE["IDUSER"])){
    $auther=DB::table('users')->where('username',$_COOKIE['IDUSER'])->get();
 if(count($auther)==1){
 $auther=$auther;
 }
 else{
     $auther='0';
    }
  }
@endphp
<div class="product_items_special">
    <div class="grid wide">
        <div class="product_list_container">
            <div class="product_list_menu_direction l-3 m-4 c-0">
                <div class="catetory_menu">
                    <div class="catetory_menu_head">
                        <h2>Danh mục sản phẩm</h2>
                    </div>
                    <ul class="catetory_menu_body">
                        <li><a href="{{route('product.sanpham.tungloai')}}/raucu">Rau củ</a></li>
                        <li><a href="{{route('product.sanpham.tungloai')}}/haisan">Hải sản</a></li>
                        <li><a href="{{route('product.sanpham.tungloai')}}/traicay">Trái cây</a></li>
                        <li><a href="{{route('product.sanpham.tungloai')}}/douong">Đồ uống</a></li>
                        <li><a href="{{route('product.sanpham.tungloai')}}/thitrung">Thịt trứng</a></li>
                    </ul>
                </div>


                <div class="catetory_menu">
                    <div class="catetory_menu_head">
                        <h2>Sản phẩm tương tự</h2>
                    </div>

                    @foreach ($tbsanphamnoibat as $sanpham)
                    <ul class="catetory_menu_body catetory_menu_body_list_top">
                        <li><a class="creatidramdom" href="{{$sanpham->maSanPham}}-{{$sanpham->soLuong>0?1:0}}-{{$sanpham->maLoaiHang}}">
                                <img src=" {{$sanpham->imageSanPham}}"
                                    alt="">
                                <div class="catetory_menu_body_top_item">
                                    <div class="top_item_name">
                                        {{$sanpham->tenSanPham}}
                                    </div>
                                    <div class="top_item_price">
                                        {{$sanpham->priceSale}}
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    @endforeach
                    
                </div>
            </div>

            <div class="list_ifm_item_detail_product  l-9 m-8 c-12">
                <div class="list_ifm_item_detail_view l-6 m-6 c-12">
                    <div class="item_detail_view_heading">
                        <img src="{{$tbchitiet->imageSanPham}}" alt="{{$tbchitiet->tenSanPham}} poly food" title="Hình ảnh Chỉ mang tính chất minh Họa">
                    </div>
                    <div class="item_detail_view_heading_list_img">
                        <img src="{{$tbchitiet->imageSanPham}}" alt="{{$tbchitiet->tenSanPham}} poly food" onclick="changeImage(this)" title="Hình ảnh Chỉ mang tính chất minh Họa" />
                        <img src="{{$tbchitiet->imageSanPham1}}" alt="{{$tbchitiet->tenSanPham}} poly food" onclick="changeImage(this)" title="Hình ảnh Chỉ mang tính chất minh Họa" />
                        <img src="{{$tbchitiet->imageSanPham2}}" alt="{{$tbchitiet->tenSanPham}} poly food" onclick="changeImage(this)" title="Hình ảnh Chỉ mang tính chất minh Họa" />
                        <img src="{{$tbchitiet->imageSanPham3}}" alt="{{$tbchitiet->tenSanPham}} poly food" onclick="changeImage(this)" title="Hình ảnh Chỉ mang tính chất minh Họa" />
                    </div>
                    <div class="item_detail_view_heading_list_btn">
                        <button class="btn btn-veges here" title="Mô tả sản phẩm">Mô tả</button>
                        <button class="btn btn-veges" title="Bình luận sản phẩm"><a href="#binhluan">Đánh
                                giá</a></button>

                    </div>
                </div>

                <div class="list_ifm_item_detail_ifm  l-6 m-6 c-12">
                    <h2 class="item_detail_ifm_name">{{$tbchitiet->tenSanPham}}</h2>
                    <div class="item_detail_ifm_name_preview l-12 m-12 c-12">
                        <div class="item_detail_ifm_name_preview-start row">
                            <div class="box_star">
                                <a href="#danhgiasanpham" class="index_star">{{round($starbinhluan,1)}}</a>
                                <a href="#danhgiasanpham" class="star_color"> </a>
                                <a href="#danhgiasanpham" class="star_color"> </a>
                                <a href="#danhgiasanpham" class="star_color"> </a>
                                <a href="#danhgiasanpham" class="star_color"> </a>
                                <a href="#danhgiasanpham" class="star_color "> </a>
                            </div>
                            <div class="box_star">

                                <span><a href="#danhgiasanpham">{{count($binhluan)}}</a><span>Đánh Giá</span> </span>
                            </div>
                            <div class="box_star">
                                <span>{{$tbchitiet->sale}} Đã Bán</span>
                                <i class="fa-solid fa-question" title="Sản phẩm Uy Tính chất Lượng"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item_detail_ifm_status">
                        <!-- outOfStock thì hết hàng còn lại là còn hàng value 1 là còn hàng valeu 0 hết hàng-->
                        <input type="hidden" name="status" class="outOfStock" value="{{$data['status']}}">
                        <input type="hidden" name="idProduct" class="idProduct" value="{{$data['id']}}">
                        <input type="hidden" name="kindProduct" class="kindProduct" value="{{$data['maLoaiHang']}}">
                        <span class="status">Trạng Thái</span> <span class="status_content" title="Trạng Thái Sản Phẩm"><i class="fa-solid fa-check"></i><span class="status_des">Còn Hàng</span> </span>
                    </div>
                    <h5 class="item_detail_ifm_price">{{number_format($tbchitiet->priceSale)}}đ</h5>
                    <p class="item_detail_ifm_des">
                        Giá trị dinh dưỡng: {{$tbchitiet->moTa}}
                    </p>

                    <div class="form-detail-action">

                        <div class="custom custom-btn-number">
                            <label class="f-left">Số lượng: </label>
                            <button class="qtyminus">-</button>
                            <input type="text" min="1" max="100" class="quantity" value="1">
                            <button class="qtyplus">+</button>
                        </div>

                        <button type="submit" class="btn btn-veges btn_buynow" title="Mua hàng">
                            <span>Mua hàng <i class="fa .fa-caret-right"></i></span>
                        </button>

                    </div>
                    <div class="tag-product">
                        View: <strong>{{$tbchitiet->luotXem}}</strong>
                    </div>

                    <div class="social-sharing">
                        <div class="social-media" data-permalink="https://dualeo-x.mysapo.net/cherry-do-canada-loai-to-1">
                            <label>Chia sẻ: </label>
                            <a target="_blank" href="//www.facebook.com/sharer.php?u=https://dualeo-x.mysapo.net/cherry-do-canada-loai-to-1" class="share-facebook" title="Chia sẻ lên Facebook">
                                <i class="fab fa-facebook"></i>
                            </a>

                            <a target="_blank" href="//twitter.com/share?text=hong-do-my" class="share-twitter" title="Chia sẻ lên Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a target="_blank" href="//pinterest.com/pin/create/button/?url=https://dualeo-x.mysapo.net/cherry-do-canada-loai-to-1" class="share-pinterest" title="Chia sẻ lên pinterest">
                                <i class="fab fa-pinterest"></i>
                            </a>

                            <a target="_blank" href="//plus.google.com/share?url=https://dualeo-x.mysapo.net/cherry-do-canada-loai-to-1" class="share-google" title="+1">
                                <i class="fab fa-google-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>
                
                <div class="container_box_des_full l-12 m-12 c-12">
                    <p>Giá trị dinh dưỡng: {{$tbchitiet->moTa}} </p>

                </div>


                <form class="container_paymoney" method="POST" onsubmit="return  validate_binhluan()"  action="{{route('product.addBinhLuan')}}" >
                    @csrf
                    <h6 style=" font-size: 1.8rem; margin:12px 0 ;">Viết bình luận của bạn:</h6>
                    <input type="hidden" name="idProduct" value="{{$data['id']}}">
                    <input type="hidden" name="idtaikhoang" value="@php echo (!empty($auther))?$auther[0]->id:0; @endphp">
                    <div class="box_message box_comment" style="display: flex;">
                        <fieldset style="border: none;" class="">
                            <legend></legend>
                            <input required type="text" placeholder="Tên:"  value="@php echo (!empty($auther))?$auther[0]->fullname:''; @endphp" class="form-control"
                                        name="kh_ten" id="kh_ten" >
                            <span class="meassage" for="kh_ten"></span>
                        </fieldset>

                        <div class="" style="flex: 1;">
                            <input type="text" id="kh_coment" require name="kh_coment" placeholder="Bình luận ở đây ..." value="">
                        </div>
                        <div>
                            <strong>Số Sao</strong>
                            <select style="width: 50px;font-size:16px;" name="start_get" id="">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-veges btn_conment" title="Gửi bình luận">Gửi</button>
                    </div>

                </form>
                <div id="binhluan" class="container_comments l-12 m-12 c-12">

                    <h2 class="container_comments_head">Bình luận</h2>
                    <div class="customer_comment_container">                       
                        @foreach ($binhluan as $user)
                        <div class="customer_comment">
                            <div class="customer_comment_box-start">
                            </div>
                            <div class="customer_comment_box">
                                <img class="avata"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwil8avutl7KM-KSPTO9bQ-ViBy4XAvFi0j5IMMyI&s"
                                    alt="">
                                <div class="customer_comment_box_des">
                                    <h3> {{$user->fullname}}</h3>
                                    <div class="box_star">
                                    
                                        @for ($i=0; $i <$user->votes ; $i++) 
                                            <div class="star_color"> </div>                                          
                                        @endfor
                                                           
                                    </div>
                                    <time> {{date("d/m/Y h:m:s", strtotime($user->ngayBinhLuan))}}</time>
                                    <p class="customer_comment_content">
                                      {{$user->comentBL}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Nội dung Bình Luân ở đây -->
            </div>
        </div>

    </div>
          
</div>

<script>
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
    let creatidramdom=document.querySelectorAll('a.creatidramdom');
    let top_item_price=document.querySelectorAll('.top_item_price');
    let container_paymoney_form=document.querySelector('.container_paymoney');
    
    let idProduct =document.querySelector('.idProduct').value;    
    let  outOfStocks =document.querySelector('.outOfStock').value;   
    let kindProduct=document.querySelector('.kindProduct').value;
    let link=container_paymoney_form.getAttribute('action').replaceAll('-','');
    link+=`${makeid(6)}${idProduct}-${makeid(6)}${outOfStocks}-${makeid(6)}${kindProduct}-${makeid(10)}#danhgiasanpham`
    container_paymoney_form.setAttribute('action',link);
    for(let i =0;i<creatidramdom.length;i++){
        top_item_price[i].innerText=coverMoney(top_item_price[i].innerText);
        let gethref=creatidramdom[i].getAttribute('href');
      let array_link=gethref.split('-');
        for(let j =0;j<array_link.length;j++){
            array_link[j]=makeid(6)+array_link[j];
        }
        array_link=array_link.join('-')+'-'+makeid(10);
        creatidramdom[i].setAttribute('href',array_link);
    }
    function coverMoney(coin) {
    let dollarUSLocale = Intl.NumberFormat('en-US');
    return `${dollarUSLocale.format(Math.round(coin))} đ`
}
    let list_product_start=document.querySelectorAll('.box_star a.star_color');
    let index_star=document.querySelector('.index_star');
    let start_votes=Number(index_star.innerText);
    index_star.innerText=(start_votes.toFixed(1));
    
    if(index_star){
        number_start=index_star.innerText;
        let first_number=Number(number_start[0]);
        let last_number=Number(number_start[number_start.length-1]);
        for (let i=first_number+1;i<list_product_start.length;i++){
            list_product_start[i].classList.add('nocolor');
        }
        if(last_number>=5){
            list_product_start[first_number].classList.add('haftcolor');
        }
        else{
            list_product_start[first_number].classList.add('nocolor');
        }
    }
    let price_orgin_item=document.querySelector('.item_detail_ifm_price_boxsale del');
    price_orgin_item.innerText=coverMoney(make_number(price_orgin_item.innerText));
    let vale_saleof=price_orgin_item.innerText;
    let item_detail_ifm_price=document.querySelector('.item_detail_ifm_price').innerText;
    document.querySelector('.item_detail_ifm_price').innerText=coverMoney(make_number(item_detail_ifm_price));
    function make_number(s){
        s=s.replaceAll(' ','');
        s=s.replaceAll('đ','');
        s=s.replaceAll(',','');
        s=s.replaceAll('.','');
        return Number(s);
    }
    if(make_number(vale_saleof) <=0 ||(make_number(vale_saleof)<= make_number(item_detail_ifm_price)) || String(vale_saleof)=='0' ){
        price_orgin_item.innerHTML='';
        document.querySelector('.item_detail_ifm_price_boxsale-salfeof').classList.add('an');
    }
    else{
        let vale_del=make_number(vale_saleof);
        let value_sale=make_number(item_detail_ifm_price);
        let giam=((1-value_sale/vale_del)*100).toFixed(2);
        document.querySelector('.item_detail_ifm_price_boxsale-salfeof').innerHTML=`${giam}%`
    }
    function validate_binhluan(){
        return true;
    }
</script>
@endsection

    
@php
        
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

    $apiSanpham=[];
    $apiSanpham=json_encode($listapiSanpham);
@endphp
@section('api')
<script>
    api='<?php echo $apiSanpham; ?>';
    api=JSON.parse(api);
    
</script> 

@endsection
@section('js')
<script src="{{asset('js/sanphamchitiet.js')}}"></script>
@endsection