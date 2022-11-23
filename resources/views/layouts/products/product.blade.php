@extends('layoutAdmin.layoutAdmin')
@section('css')
<link rel="stylesheet" href="{{asset('admincss/chart.css')}}">
@endsection
@section('title')
    Quản lý Sản Phẩm
@endsection
@section('directory')
    > <a href="#">List Products</a>
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
            <button name="members" class="members" value="2"><a href="{{route('admin.catelory')}}">Quản lý Danh Mục</a></button>
            {{-- <button name="admin" class="admins" value="2">Top Order</button>
            <button name="admin" class="allmembers" value="2">All Members</button> --}}
        </div>
        <div style="margin-right: 40px;">
            <h4>Total Products: <span> {{$lenProduct}} </span></h4>
            <h4>Out of Stock: <span> {{$lenStock}} </span></h4>
        </div>
    </div>
    <form class="manager_member-content">
        <span>Products</span>
        <button name="newaccount" value="2"><a href="{{route('admin.addProduct')}}">Add Product</a></button>
        <button name="findmember" value="2"><a href="{{route('admin.findmember')}}">Find Product</a></button>
        <button name="export" value="2"><a href="#">Export members(Excel)</a></button>
    </form>

    <form class="form_member" >
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Kind</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>CreatAt</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr class="box_item">
                <td> <img src="{{$product->imageSanPham}}" alt=""></td>
                <td>{{$product->maSanPham}}</td>
                <td>{{$product->tenSanPham}}</td>
                <td class="box_item_kind">{{$product->tenLoaiHang}}</td>
                <td>{{number_format($product->priceSale)}} đ</td>
                <td>{{number_format($product->soLuong)}} </td>
                <td>{{$product->ngayNhapHang}}</td>
                <td><a href="{{route('admin.changeProduct')}}{{$product->maSanPham}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="?delete={{$product->maSanPham}}"><i class="fa-solid fa-trash-can"></i></a></td>
             </tr>
              @endforeach
               
                         
            </tbody>
        </table>
    </form>
</div>
<div class="direction_profile">
    {{$products->links()}}
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
    (function () {
        

    })()
</script>
@endsection
