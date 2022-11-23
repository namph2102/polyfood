@extends('layoutAdmin.layoutAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('admincss/chart.css')}}">
@endsection
@section('title')
    Quản lý Sản Phẩm
@endsection
@section('directory')
    > <a href="#">List Orders</a>
@endsection
@section('message') 
    @if(!empty($message))
    <h2 >{{$message}}</h2>
    @endif
@endsection
@section('adminContainer')
<div class="manager_member">
    <div class="manager_member-head" action="">
        <div>
            <button name="members" class="members" value="2">Cash</button>
            <button name="admin" class="admins" value="2">Banking</button>
            <button name="admin" class="allmembers" value="2">Top</button>
        </div>
        <div style="margin-right: 40px;">
            <h4>Total Orders: <span> {{$lenOrder}} </span></h4>
            <h4>Authentication: <span>{{$lenStatus}} </span></h4>
        </div>
    </div>
    <form class="manager_member-content">
        <span>Orders</span>
        <button name="newaccount" value="2"><a href="{{route('admin.showAllOrder')}}">Settings Orders</a></button>
        <button name="findmember" value="2"><a href="{{route('admin.showAllOrder')}}">Find Orders</a></button>
        <button name="export" value="2"><a href="#">Export members(Excel)</a></button>
    </form>

    <form class="form_member" >
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Mã thanh Toán</th>
                    <th>Full Name </th>
                    <th>Phone</th>               
                    <th>Trạng Thái</th>
                    <th>PT Thanh Toán</th>
                    <th>Xác thực</th>
                    <th colspan="2">Action</th>
                    <th>Tổng hóa đơn</th>
                </tr>
            </thead>
            <tbody>
           @foreach ($orders as $order)
           <tr class="box_item">
            <td><a href="{{$order->maThanhToan}}">#{{$order->maThanhToan}}</a></td>
            <td>{{$order->fullname}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->PtThanhToan}}</td>
            <td>{{($order->xacThuc==1)?'Đã xác thực':'Chưa xác thực'}}</td>
           <td><a href="{{$order->maThanhToan}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
           <td><a href="{{$order->maThanhToan}}"><i class="fa-solid fa-trash-can"></i></a></td>
           <td>{{number_format($order->paymoney)}} đ</td>
        </tr>
           @endforeach
              
           
               
                         
            </tbody>
        </table>
    </form>
</div>
<div class="direction_profile">
    {{-- {{$products->links()}} --}}
    {{-- <ul>
    <li><a class="active" href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">4</a></li>
    <li><a href="">5</a></li>
    </ul> --}}
</div>
@endsection 

@section('js')
<script>

</script>
@endsection
