<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fopy Fresh - Đơn Hàng- {{$user->maThanhToan}}
    </title>
    
</head>
<body> 
    <h1 style="margin: 12px 0;padding:0;">Xin Chào Bạn {{$user->fullname}}</h1>
    <p style="font-size: 18px;">Bạn đã đặt hàng tại hệ thống chúng tôi vui lòng kiểm tra lại thông tin đơn hàng của bạn</p>
    <button style="
    border: none;
    outline: none;
    border-color: rgb(190, 162, 162);
    
    border: radius 8px;">
    <a style="
        color: rgb(238, 228, 228);
        font-size: 14px;
        border-radius: 8px;
        text-decoration: none;
        background-color: rgb(21, 119, 12);
       
        padding: 8px 12px;" href="{{route('xacthucemail')}}/{{$user->maThanhToan}}">Xác Thực</a></button>
        <button style="
         border: none;
         outline: none;
         border-color: rgb(190, 162, 162);
       
         border: radius 8px;"><a style="
         background-color: rgb(196, 97, 16);
             color: rgb(238, 235, 235);
             font-size: 14px;
             border-radius: 8px;
             text-decoration: none;
            
             padding: 8px 12px;" href="{{route('product.sanpham')}}">Tiếp Tục Mua Hàng</a></button>
    <table  border="1" style="width: 500px;     border-collapse: collapse ; text-align:center;">
        <caption style="font-size: 20px;
        font-size: 20px;
        font-weight: bold;
        margin: 12px 0;
        background-color: #ff5722;
        padding: 12px 0;
        border-radius: 4px;
        color: snow;">Thông Tin Đơn Hàng #{{$user->maThanhToan}} </caption>
      <tr>
        <th>STT</th>
        <th>Ảnh</th>
        <th>Tên Sản Phẩm</th>
         <th>Giá Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Tổng</th>
      </tr>
      @php
       $i=1;
      @endphp
      @foreach ($lis_bag as $item)
      <tr>
        <td>{{$i++}}</td>
        <td><img style="width: 40px;height:40px;" src="{{$item->imageSanPham}}" alt=""></td>
        <td>{{$item->tenSanPham}}</td>
        <td>{{number_format($item->priceSale)}} đ</td>
        <td>{{number_format($item->soLuong)}}</td>
        <td>{{number_format($item->priceSale*$item->soLuong)}} đ</td>
    </tr>
      @endforeach
        <tr>
            <td colspan="4" style="font-size: 20px; font-weight:bold;">Tổng Cộng</td>
            <td colspan="2"><h3>{{number_format($user->paymoney)}} đ</h3></td>
        </tr>
    </table>

    <table border="1" style="width: 500px;    border-collapse: collapse; text-align:center;">
        <caption style="font-size: 20px;
        font-weight: bold;
        margin: 12px 0;
        background-color: #ca5b5b;
        padding: 12px 0;
        color: #ead6d6;
        border-radius: 4px
    px
    ;">Thông Tin Khách Hàng</caption>
        <tr style="height:8px">
            <th>Người Đặt Hàng</th>
            <td>{{$user->fullname}}</td>
        </tr>
        <tr>
            <th>Email </th>
            <td> {{$user->email}}</td>
        </tr>
        <tr>
            <th>Số Điện Thoại </th>
            <td>  {{$user->phone}}</td>
        </tr>
        <tr>
            <th>Phương Thức Thanh Toán </th>
            <td>{{$user->PtThanhToan}} </td>
        </tr>
        <tr>
            <th>Địa Chỉ </th>
            <td>{{$user->address}} </td>
        </tr>
   
    </table>
</body>

</html>
