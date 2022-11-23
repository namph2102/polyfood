@extends('profile.layoutprofile')
@section('directional')
<a href="">Account</a><i class="fa-solid fa-angle-right"></i> <a href="">Đơn Hàng</a>
@endsection
{{--  Xuất ra Thông Báo --}}
@section('message')
@if(!empty($message))
<h2 style="color: rgba(255,255,255,0.87);" class="alert-teal alert-message ">{{$message}}  </h2>
@endif
@endsection
{{--  end Xuất ra Thông Báo --}}

{{-- Khung lay out --}}
@section('container')
<div class="profile_container_body l-9 m-6 c-12">
    <div class="nav_profile_bag">
        <a href="?type=1" class="menu_profile-nav {{($type==1 ||$type==0)?'active':''}}">Tất cả</a>
        <a href="?type=2" class="menu_profile-nav {{$type==2?'active':''}}">Đã Xác Thực</a>
        <a href="?type=3" class="menu_profile-nav {{$type==3?'active':''}}">Chờ lấy hàng</a>
        <a href="?type=4" class="menu_profile-nav {{$type==4?'active':''}}">Đang giao</a>
        <a href="?type=5" class="menu_profile-nav {{$type==5?'active':''}}">Đã giao</a>
        <a href="?type=6" class="menu_profile-nav {{$type==6?'active':''}}">Đã Hủy</a>
    </div>
    <table border="1" id="order_table">
        <thead>
            <tr>
                <th>Mã Đơn Hàng</th>
                <th>Ngày đặt hàng</th>
                <th>TT Xác thực</th>
                <th>PT Thanh Toán</th>
                <th>Trạng Thái</th>
                <th>Address</th>
                <th>Tổng Tiền</th>
            </tr>
        </thead>
       
        <tbody>
           @php
           @endphp
            @if(!empty(count($dbThanhToan)))
            
                    @foreach ($dbThanhToan as $thanhtoan)
                    <tr>
                        <td># <a href="?maDonHang={{$thanhtoan->maThanhToan}}&type={{$type}}">{{$thanhtoan->maThanhToan}}</a></td>
                        <td> <time>{{date("d/m/Y h:m:s", strtotime($thanhtoan->ngayThanhToan))}}</time></td>
                        @php echo (!empty($thanhtoan->xacThuc))?'<td><span class="order_status" title="Đã xác thực thành công">Đã Xác Thực</span></td>':'<td><span title="Vào email để xác thực" class="order_status notstatus">Chưa Xác Thực</span></td>';@endphp  
                        <td>{{$thanhtoan->PtThanhToan}}</td>
                        <td>{{$thanhtoan->status}}</td>
                        <td class="address">{{$thanhtoan->address}}</td>
                        <td class="totol_product">{{number_format($thanhtoan->paymoney)}} đ</td>
                    </tr>
                    @endforeach     
            @endif
            {{-- <tr>
                <td>#sadd44s</td>
                <td>10:09:20 20/05/2020</td>
                <td><span class="order_status" title="Đã xác thực thành công">Đã Xác Thực</span></td>
                <td>Đơn hàng mới</td>
                <td>0877669990</td>
                <td class="address">200 / 34 , đông hưng thuận, quân 12 TP HCM</td>
                <td>1,125,125 đ</td>
            </tr>
            <tr>
                <td>#sadd44s</td>
                <td>10:09:20 20/05/2020</td>
                <td><span title="Vào email để xác thực" class="order_status notstatus">Chưa Xác Thực</span></td>
                <td>Đơn hàng mới</td>
                <td>0877669990</td>
                <td class="address">200 / 34 , đông hưng thuận, quân 12 TP HCM</td>
                <td>1,125,125 đ</td>
            </tr> --}}
        </tbody>
    </table>
    <div class="modal_list_product @if(empty(count($product_list))) {{'hidden'}}@endif">                 
        <div class="modal_list_product-container">
            <div class="modal_list_product-close">
                <i class="fa-solid fa-square-xmark"></i>
            </div>
            <table border="1">
                <caption>THÔNG TIN ĐƠN HÀNG @if(!empty(count($product_list))) # {{$product_list[0]->maThanhToan}} @endif </caption>
            
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
            @php $index=1;$total=0;$amount_total=0; @endphp
             @if(!empty(count($product_list)))
                    
             @foreach($product_list as $product)
                    @php $total+=$product->soLuong*$product->priceSale; $amount_total+=$product->soLuong @endphp
             <tr>
                <td>{{$index++}}</td>
                <td><img src="{{$product->imageSanPham}}" alt=""></td>
                <td>{{$product->tenSanPham}}</td>
                <td>{{number_format($product->priceSale)}} đ</td>
                <td>{{$product->soLuong}}</td>
                <td>{{number_format($product->soLuong*$product->priceSale)}} đ</td>
                </tr>
             @endforeach
              
            @endif
                  
                 <tr class="sumtotal">
                    <td c colspan="4">
                        Tạm Tính - <span style="font-size: 1.3rem; color:red;">Chưa bao gồm thuế và ship</span>
                    </td>
                
                    <td >{{number_format($amount_total)}}</td>
                    <td >{{number_format($total)}} đ</td>
                 </tr>
                </tbody>
            </table>
        </div>
    </div>
    @php echo empty(count($dbThanhToan))?'<img style="width: 300px; height:300px;" src="https://bizweb.dktcdn.net/100/398/753/themes/813175/assets/empty-cart.png?1663813026500" alt="">':''; @endphp
    <div style="margin:12px 0;" class="page_list_container">
        <!-- Điều hướng Trang -->
            {{$dbThanhToan->links()}}
           <!-- End Điều hướng Trang -->
    </div>
</div>

@endsection

@section('jsvip')
 <script>
     let modal_list_product=$('.modal_list_product');
     let btn_close_modal=$('.modal_list_product-close');
     let modal_list_product_container=$('.modal_list_product-container');
     console.log('modal_list_product');
     btn_close_modal.onclick=function(){
        modal_list_product.classList.add('hidden');
       
     }
     modal_list_product.addEventListener('click',function(e){
        modal_list_product.classList.add('hidden')
    });
    modal_list_product_container.addEventListener('click',function(e){
      e.stopPropagation();
    });
 </script>
@endsection