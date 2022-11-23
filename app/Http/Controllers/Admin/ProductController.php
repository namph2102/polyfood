<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// quản lý admin sản phẩm
class ProductController extends Controller
{
    public function showAllProduct(Request $request){
        $message="";
        function deleteimga($avata){
            if(strpos($avata,'imgsp')){
                $root=public_path('imgsp');           
                $link= substr($avata,strpos($avata,'imgsp')+strlen('imgsp'),strlen($avata)-strpos($avata,'imgsp/'));
                $link_merger=  $root. $link;
                if(file_exists($link_merger)){
                    unlink($link_merger);
                }
           
                return true;
            }
            return false;
        }
        if(!empty($request->delete)){
            $delete= $request->delete;
            $nameImage=DB::table('sanphamchitiet')->where('maSanPham',$delete)->get()[0];
            $nameDBSP=DB::table('sanpham')->where('maSanPham',$delete)->get()[0];
            deleteimga($nameImage->imageSanPham1);
            deleteimga($nameImage->imageSanPham2);
            deleteimga($nameImage->imageSanPham3);
            deleteimga($nameDBSP->imageSanPham);
            DB::table('sanpham')->where('maSanPham',$delete)->delete();
            DB::table('sanphamchitiet')->where('maSanPham',$delete)->delete();
            DB::table('donhang')->where('maSanPham',$delete)->delete();
            $message="Xóa thành công Mã Sản Phẩm :".$delete;
        }
    
        $products=DB::table('sanpham')
        ->leftJoin('loaihang','sanpham.maLoaiHang','=','loaihang.maLoaiHang')
        ->paginate(12);
       $lenProduct=DB::table('sanpham')->count();
       $lenStock=DB::table('sanpham')->where('soLuong','=',0)->count();
        return view('layouts.products.product',compact('products','lenProduct','lenStock','message'));
    }
    public function showAddProduct(){
        return view('layouts.products.addProduct');
    }
    public function HandleAddProduct(Request $request){
        $tenSanPham=$request->fullname;
        $priceSale=$request->PriceSale;
        $priceOrigin=$request->PriceOrigin;
        $maLoaiHang=$request->maLoaiHang;
        $tenSanPham=$request->fullname;
        $soLuong=$request->amount;
        $moTa=$request->moTa;
        $imageSanPham='';
        $imageSanPham1='';
        $imageSanPham2='';
        $imageSanPham3='';
        if ($request->hasFile('fileImage')) {
            $avata=$request->file('fileImage');
            $id=uniqid() . '_' . uniqid() . '_' .($avata->getClientOriginalName());
            $avata->move('imgsp', $id);
           $linkAvata=$_SERVER['HTTP_ORIGIN'] . '/imgsp/'.$id;
           $imageSanPham=$linkAvata;
        }
        if ($request->hasFile('fileImage1')) {
            $avata=$request->file('fileImage1');
            $id=uniqid() . '_' . uniqid() . '_' .($avata->getClientOriginalName());
            $avata->move('imgsp', $id);
           $linkAvata=$_SERVER['HTTP_ORIGIN'] . '/imgsp/'.$id;
           $imageSanPham1=$linkAvata;
        }
        if ($request->hasFile('fileImage2')) {
            $avata=$request->file('fileImage2');
            $id=uniqid() . '_' . uniqid() . '_' .($avata->getClientOriginalName());
            $avata->move('imgsp', $id);
           $linkAvata=$_SERVER['HTTP_ORIGIN'] . '/imgsp/'.$id;
           $imageSanPham2=$linkAvata;
        }
        if ($request->hasFile('fileImage3')) {
            $avata=$request->file('fileImage3');
            $id=uniqid() . '_' . uniqid() . '_' .($avata->getClientOriginalName());
            $avata->move('imgsp', $id);
           $linkAvata=$_SERVER['HTTP_ORIGIN'] . '/imgsp/'.$id;
           $imageSanPham3=$linkAvata;
        }
      
        DB::table('sanpham')->insert([
            'maLoaiHang'=>$maLoaiHang,
            'tenSanPham'=>$tenSanPham,
            'priceSale'=>$priceSale,
            'priceOrigin'=>$priceOrigin,
            'soLuong'=>$soLuong,
            'priceOrigin'=>$priceOrigin,
            'imageSanPham'=>$imageSanPham,
        ]);
      
       $maSanPham=DB::table('sanpham')->where('imageSanPham',$imageSanPham)->get(['maSanPham'])[0]->maSanPham;
     
       DB::table('sanphamchitiet')->insert([
        'maSanPham'=>$maSanPham,
        'imageSanPham1'=>$imageSanPham1,
        'imageSanPham2'=>$imageSanPham2,
        'imageSanPham3'=>$imageSanPham3,
        'moTa'=>$moTa,
    ]);
       $message="Thêm sản phẩm thành công !";
        return view('layouts.products.addProduct',compact('message','tenSanPham','priceSale','priceOrigin','soLuong','maLoaiHang','moTa'));
    }
    public function HandleChangeProduct(Request $request){
        $maSanPham=$request->maSanPham;
        $message='Update Thành công mã sản phẩm: '.$maSanPham;
        function handleImage($request,$nameFile,$maSanPham, $nameImage,$nametable='sanphamchitiet'){
           
            if ($request->hasFile($nameFile)) {
                $imgOld=DB::table($nametable)->where('maSanPham',$maSanPham)->get()[0]->$nameImage;      
                if(strpos($imgOld,'imgsp')){
                    $imgold = public_path('imgsp') . str_replace($_SERVER['HTTP_ORIGIN'] . '/imgsp', '', $imgOld);              
                    if(file_exists($imgold)){
                        unlink($imgold);                      
                    }
                }

                $avata=$request->file($nameFile);
                $id=uniqid() . '_' . uniqid() . '_' .($avata->getClientOriginalName());
                $avata->move('imgsp', $id);
                $linkAvata=$_SERVER['HTTP_ORIGIN'] . '/imgsp/'.$id;            
                 DB::table($nametable)->where('maSanPham',$maSanPham)->update([$nameImage=>$linkAvata]);
                return true;
            }
            return '';
        }
       handleImage($request,'fileImage1',$maSanPham,'imageSanPham1');
       handleImage($request,'fileImage2',$maSanPham,'imageSanPham2');
       handleImage($request,'fileImage3',$maSanPham,'imageSanPham3');
       handleImage($request,'fileImage',$maSanPham,'imageSanPham','sanpham');
       $tenSanPham=$request->fullname;
       $priceSale=$request->PriceSale;
       $priceOrigin=$request->PriceOrigin;
       $maLoaiHang=$request->maLoaiHang;
       $tenSanPham=$request->fullname;
       $soLuong=$request->amount;
       $moTa=$request->moTa;
       DB::table('sanpham')->where('maSanPham',$maSanPham)->update([
        'maLoaiHang'=>$maLoaiHang,
        'tenSanPham'=>$tenSanPham,
        'priceSale'=>$priceSale,
        'priceOrigin'=>$priceOrigin,
        'soLuong'=>$soLuong,
        'priceOrigin'=>$priceOrigin,
    ]);
    DB::table('sanphamchitiet')->where('maSanPham',$maSanPham)->update([
        'moTa'=>$moTa,
    ]);
       $sanphamIFM=DB::table('sanpham')
       ->leftJoin('sanphamchitiet','sanpham.maSanPham','=','sanphamchitiet.maSanPham')
       ->rightJoin('loaihang','sanpham.maLoaiHang','=','loaihang.maLoaiHang')
       ->where('sanpham.maSanPham',$maSanPham)
       ->get()[0];
       return view('layouts.products.changeProduct',compact('sanphamIFM','message','maSanPham'));   
    }
    public function showchangeProduct(Request $request,$maSanPham){
        $sanphamIFM=DB::table('sanpham')
        ->leftJoin('sanphamchitiet','sanpham.maSanPham','=','sanphamchitiet.maSanPham')
        ->rightJoin('loaihang','sanpham.maLoaiHang','=','loaihang.maLoaiHang')
        ->where('sanpham.maSanPham',$maSanPham)
        ->get()[0];
        return view('layouts.products.changeProduct',compact('sanphamIFM','maSanPham'));
    }


    // Quản lý danh muc
    public function HandleCatelory(Request $request){
        $danhmuc=$request->danhmuc;
        $message='Thêm Thành Công Danh mục mới: '. $danhmuc;
        if(!empty($danhmuc)) {
            DB::table('loaihang')->insert(['tenLoaiHang'=> $danhmuc]);
        }
        if($request->danhmucold){
            if($request->danhmucnew){
                $nameold=$request->danhmucold;
                $namenew=$request->danhmucnew;
                $message="Đổi tên danh mục <".$nameold."> thành < ".$namenew." >Thành công !";
                DB::table('loaihang')->where('tenLoaiHang',$nameold)->update(['tenLoaiHang'=> $namenew]);
            }
        }
        $list_danhmuc=DB::table('loaihang')->get();
        return view('layouts.products.addCatetory',compact('list_danhmuc','message'));
    }

    public function showCatelory(Request $request){
        $message='';
        if($request->delete){
            $delete= $request->delete;
            $message="Xóa thành công  Mã danh mục : ".$delete;
            DB::table('sanpham')->where('maLoaiHang',$delete)->delete();
            DB::table('loaihang')->where('maLoaiHang',$delete)->delete();
        }
       
        $list_danhmuc=DB::table('loaihang')->get();

        if($request->change){
           $change= $request->change;
           $nameDanhMuc= DB::table('loaihang')->where('maLoaiHang',$change)->get()[0];
            $message="Nhập thông tin để thay đổi !";
            $input_chagne='Yes';
            return view('layouts.products.addCatetory',compact('list_danhmuc','message','input_chagne','nameDanhMuc'));
        }
        return view('layouts.products.addCatetory',compact('list_danhmuc','message'));
    }
}
