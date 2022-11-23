<?php

namespace App\Http\Controllers\Product;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class ProductController extends Controller
{
    public $isload = true;

    public function sanpham($category = null)
    { 
        $title = "Tất Cả Sản Phẩm";
        $apiSanpham = DB::table('sanpham')->get();
        $phantrang = DB::table('sanpham')->paginate(12);
        $list_Sp_Hot = DB::table('sanphamchitiet')
            ->leftJoin('sanpham', 'sanphamchitiet.maSanPham', '=', 'sanpham.maSanPham')
            ->orderByRaw('sanphamchitiet.sale DESC')
            ->limit(6)
            ->get();
        return view('clients.sanpham', compact('phantrang', 'apiSanpham', 'title', 'list_Sp_Hot'));
    }

    public function sanphamtungloai(Request $request, $maLoaiHang = null)
    {
        $apiSanpham = [];
        $phantrang = [];
        $title = "Tất Cả Sản Phẩm";
        $list_Sp_Hot = DB::table('sanphamchitiet')
            ->leftJoin('sanpham', 'sanphamchitiet.maSanPham', '=', 'sanpham.maSanPham')
            ->orderByRaw('sanphamchitiet.sale DESC')
            ->limit(6)
            ->get();
        if ($maLoaiHang) {
                $title = DB::table('loaihang')->where('maLoaiHang', $maLoaiHang)->get()[0]->tenLoaiHang;
                $phantrang = DB::table('sanpham')
                    ->where('maLoaiHang', $maLoaiHang)
                    ->paginate(12);
        }
        else{
            $phantrang = DB::table('sanpham')
            ->paginate(12);
        }
        $apiSanpham = DB::table('sanpham')
            ->get();
     
        return view('clients.sanpham', compact('phantrang', 'apiSanpham', 'title', 'list_Sp_Hot'));
    }

    public function sanphamchitiet(Request $request, $id = null, $status = null, $kind = null, $slug = null, $viewhere = null)
    {
        $re = $request->all();
        $id = substr($id, 6, strlen($id));
        $status = substr($status, -1, 1);
        $kind = substr($kind, -1, 1);
        $data = [
            'id' => $id,
            'status' => $status,
            'maLoaiHang' => $kind,
            'slug' => $slug,
        ];
        $apiSanpham = DB::table('sanpham')->get();
        //Tăng lượt xem lên 1
        DB::table('sanphamchitiet')->where('maSanPham', $id)->increment('luotXem', 1);
        // lấy của sản phẩm vời sản phẩm chi tiết
        $tbchitiet = DB::table('sanphamchitiet')
            ->join('sanpham', 'sanpham.maSanPham', '=', 'sanphamchitiet.maSanPham')
            ->where('sanphamchitiet.maSanPham', '=', $id)
            ->get();
        $tbsanphamnoibat = DB::table('sanpham')
            ->leftJoin('sanphamchitiet', 'sanphamchitiet.maSanPham', '=', 'sanpham.maSanPham')
            ->orderByRaw('sanphamchitiet.sale DESC')
            ->where('maLoaiHang', $kind)
            ->limit(6)
            ->get();
        $tbchitiet = $tbchitiet[0];

        $binhluan = DB::table('binhluan')
            ->orderByRaw('ngayBinhLuan DESC')
            ->where('maSanPham', $id)
            ->paginate(3);
        $luotdanhgia = DB::table('binhluan')->where('maSanPham', $id)->get();
        if ($luotdanhgia) $luotdanhgia = $luotdanhgia->count();
        else $luotdanhgia = 0;
        $starbinhluan = DB::table('binhluan')
            ->where('maSanPham', $id)
            ->avg('votes');
        // Lưu database
        if ($request->content) {
            $viewhere = '#danhgiasanpham';
            $conmentBL = $request->content;
            $votes = $request->start_get;
            $maSanPham = $request->idProduct;
            $fullname = strtolower($request->kh_ten);
            $idTaiKhoang = $request->idtaikhoang;
            $dateBL = date('d-m-y  H-m-s');
            DB::table('binhluan')
                ->insert(
                    [
                        'maSanPham' => $maSanPham,
                        'fullname' => $fullname,
                        'ngayBinhLuan' => $dateBL,
                        'comentBL' => $conmentBL,
                        'idTaiKhoang' => $idTaiKhoang,
                        'votes' => $votes,
                    ]
                );
            return redirect()->back();
        }
        return view('clients.sanphamchitiet', compact('apiSanpham', 'data', 'tbchitiet', 'binhluan', 'tbsanphamnoibat', 'luotdanhgia', 'starbinhluan', 'viewhere'));
    }

    //post Bình luận
    public function addbinhluan(Request $request, $id = null, $status = null, $kind = null, $slug = null)
    {
        var_dump($request->all());
        if ($request->content) {
            $conmentBL = $request->content;
            $votes = $request->start_get;
            $maSanPham = $request->idProduct;
            $fullname = $request->kh_ten;
            $idTaiKhoang = $request->idtaikhoang;
            $dateBL = date('d-m-y  H-m-s');
            DB::table('binhluan')
                ->insert(
                    [
                        'maSanPham' => $maSanPham,
                        'fullname' => $fullname,
                        'ngayBinhLuan' => $dateBL,
                        'comentBL' => $conmentBL,
                        'idTaiKhoang' => $idTaiKhoang,
                        'votes' => $votes,
                    ]
                );
            return redirect()->back();
        }
    }
    public function lienhe()
    {
        $apiSanpham = DB::table('sanpham')->get();
        return view('clients.lienhe', compact('apiSanpham'));
    }
    public function addlienhe(Request $request)
    {
        $apiSanpham = DB::table('sanpham')->get();
        $idTaiKhoang = trim($request->kh_idTaiKhoang);
        $fullname = trim($request->kh_ten);
        $email = trim($request->kh_email);
        $phone = trim($request->kh_phone);
        $conments = trim($request->content);
        $list_table = DB::table('lienhe')->where('email', $email)->get();
        if (!empty($list_table[0])) {
            foreach($list_table as $user){
                if ($user->conments == $conments) {
                    $error = "Cảnh báo đã phát hiện spam tin nhắn! ";
                    return view('clients.lienhe', compact('error', 'apiSanpham'));
                }
            }
           
          
            DB::table('lienhe')->insert([
            'fullname' => $fullname,
            'idTaiKhoang' => $idTaiKhoang,
            'email' => $email,
            'phone' => $phone,
            'conments' => $conments,
        ]);
        $message = "Liên hệ thành công chúng tôi sẽ trả lời cho bạn qua Email: ".$email;
        return view('clients.lienhe', compact('message', 'apiSanpham'));
            
              
        }
      
    }
    public function tintuc()
    {
        $apiSanpham = DB::table('sanpham')->get();
        return view('clients.tintuc', compact('apiSanpham'));
    }
    public function tintucchitiet()
    {
        $apiSanpham = DB::table('sanpham')->get();
        return view('clients.tintucchitiet', compact('apiSanpham'));
    }
    public function giohang()
    {
        $apiSanpham = DB::table('sanpham')->get();
        return view('clients.giohang', compact('apiSanpham'));
    }
    public function gioithieu()
    {
        $apiSanpham = DB::table('sanpham')->get();
        return view('clients.gioithieu', compact('apiSanpham'));
    }

    // get don hàng
    public function thanhtoan()
    {
        $apiSanpham = DB::table('sanpham')->get();
        $auther = '';
        if (!empty($_COOKIE["IDUSER"])) {
            $auther = DB::table('users')->where('username', $_COOKIE['IDUSER'])->get();
            if (count($auther) == 1) {
                $auther = $auther;
            } else {
                $auther = '';
            }
        }

        $fullname = '';
        $phone = '0';
        $username = 0;
        $email = '';
        $address = '0';
        $thon = '';
        $xa = '';
        $huyen = '';
        $tinh = '';
        $fulladdress = '';

        if (!empty($auther)) {
            $email = $auther[0]->email;
            $fullname = $auther[0]->fullname;
            $phone = $auther[0]->phone;
            $username = $_COOKIE['IDUSER'];
            $address = $auther[0]->address;
            $fulladdress = $address;
            if (strlen($address) > 10) {
                $address = explode(',', $address);
                $thon = trim($address[0]);
                $xa = trim($address[1]);
                $huyen = trim($address[2]);
                $tinh = trim($address[3]);
            }
        }
      
        return view('clients.thanhtoan', compact('apiSanpham', 'email', 'fullname', 'phone', 'username', 'thon', 'xa', 'huyen', 'tinh', 'fulladdress'));
    }


    public function checkout(Request $request)
    {

        $maThanhToan = $request->maThanhToan;
        $fullname = $request->fullname;

        $email = $request->email;
        $phone = $request->phone;
        $PtThanhToan = $request->PtThanhToan;
        $address = $request->address;
        $paymoney = $request->paymoney;
        $listSP = $request->listSP;

        return view('clients.checkout', compact('maThanhToan', 'fullname', 'email', 'phone', 'PtThanhToan', 'address', 'paymoney', 'listSP'));
    }

    //post đơn hàng
    public function donhang(Request $request)
    {
        // $maDonHang=$request->maDonHang;
        $maThanhToan = $request->maThanhToan;
        $fullname = $request->kh_ten;
        $username = $request->username;
        $email = $request->kh_email;
        $phone = $request->kh_phone;
        $address = $request->kh_address . ', ' . $request->kh_address_xa . ', ' . $request->kh_address_huyen . ', ' . $request->kh_address_tinh;
        $PtThanhToan = $request->httt_ma;
        $ship = $request->total_ship;
        $paymoney = $request->total_paymoney;
      
        $maxID = (int)($request->maxID);
        $listSP = [];
        for ($i = 1; $i <= $maxID; $i++) {
            $nameSP = 'donhang' . $i;
            if ($request->input($nameSP)) {
                $listSP[] = $request->input($nameSP);
            }
        }
        $list_user = DB::table('users')->where('username', $username)->get();
        if (count($list_user) > 0) {
            DB::table('users')->where('username', $username)
                ->update(['phone' => $phone, 'address' => $address]);
        }
        DB::table('thanhtoan')->insert(
            [
                'maThanhToan' => $maThanhToan,
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'PtThanhToan' => $PtThanhToan,
                'ship' => $ship,
                'paymoney' => $paymoney,
            
            ]
        );
        $listSP = json_encode($listSP);

        return redirect()->route('product.checkout', compact('maThanhToan', 'fullname', 'email', 'phone', 'PtThanhToan', 'address', 'paymoney', 'listSP'));
    }
    public function sendmaildonhang(Request $request, $maThanhToan, $listSP = null)
    {
        $listSP = json_decode($listSP);
        if ($this->isload) {
            foreach ($listSP as $item) {
                $id = substr($item, 0, strpos($item, '-'));
                $amount = substr($item, strpos($item, '-') + 1, strlen($item));
                DB::table('donhang')->insert(
                    [
                        'maThanhToan' => $maThanhToan,
                        'maSanPham' => $id,
                        'soLuong' => $amount
                    ]
                );
            }
            $this->isload = false;
        }
        $lis_bag = DB::table('donhang')
            ->leftJoin('sanpham', 'sanpham.maSanPham', '=', 'donhang.maSanPham')
            ->where('donhang.maThanhToan', '=', $maThanhToan)
            ->get(['sanpham.imageSanPham', 'donhang.soLuong', 'sanpham.tenSanPham', 'sanpham.priceSale']);
        $user = DB::table('thanhtoan')
            ->where('maThanhToan', $maThanhToan)
            ->get();
        $getEmail = $user[0]->email;
        $getname = $user[0]->fullname;
        $user = $user[0];
       
        Mail::send('email.mailDonHang', compact('user', 'lis_bag'), function ($email) use ($getEmail, $getname) {
            $this->isload = true;
            $email->subject('Xác Thực Đơn Hàng');
            $email->to($getEmail, $getname);
        });
        return redirect()->route('xacthucemail');
    }

    public function xacthucEmail($maThanhToan = null)
    {
        DB::table('thanhtoan')
            ->where('maThanhToan', $maThanhToan)
            ->update(['xacThuc' => 1]);
        return view('email.passxacthuc');
    }
}
