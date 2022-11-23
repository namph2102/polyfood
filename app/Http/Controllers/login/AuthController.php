<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /*Dùng cho Regester login*/
    public function showFormRegester()
    {
        $apiSanpham = DB::table('sanpham')->get();
        return view('login.regester', compact('apiSanpham'));
    }

    public function regester(Request $request)
    {
        $apiSanpham = DB::table('sanpham')->get();
        $fullname = trim($request->kh_fullname);
        $username = trim($request->kh_username);
        $email = trim($request->kh_email);
        $password = trim($request->kh_password);
        $password = md5($password);
        $error = "Tài Khoảng" . $username . " đã tồn tại";
        $checkusername = DB::table('users')->where('username', $username)->get();

        if (count($checkusername) == 0) {
            DB::table('users')->insert([
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'password' => $password,
            ]);
        } else {
            return view('login.regester', compact('error', 'username', 'fullname', 'email', 'apiSanpham'));
        }
        setcookie("IDUSER",  $username, time() + (86400 * 30) * 30, "/");
        
        return redirect()->route('account.profile');
    }
    // show form login  
    public function showFormLogin()
    {
        $apiSanpham = DB::table('sanpham')->get();
        return view('login.login', compact('apiSanpham'));
    }
    // login cho tài khoảng
    public function login(Request $request)
    {
        $apiSanpham = DB::table('sanpham')->get();
        $username = $request->kh_username;
        $listAccount = DB::table('users')->where('username', $username)->get(['username', 'password']);
        if (count($listAccount)) {
            $password = md5($request->kh_password);
            if ($listAccount[0]->password == $password) {
                DB::table('users')->where('username',$username)->update(['status'=>1]);
                setcookie("IDUSER",  $username, time() + (86400 * 30) * 30, "/");
            } else {
                $error = "Mật Khẩu không Chính Xác";
                return view('login.login', compact('error', 'username', 'apiSanpham'));
            }
        } else {
            $error = "Tài Khoảng : \"" . $username . "\" không Tồn Tại !";
            return view('login.login', compact('error', 'apiSanpham'));
        }

        return redirect()->route('product.sanpham');
    }
    public function logout(Request $request)
    {
        $page = '';
        if (!empty($request->input('page'))) {
            $page = $request->input('page');
        } else $page = '';
        $username=$_COOKIE["IDUSER"];
        DB::table('users')->where('username', $username)->update(['status'=>'0']);
        setcookie("IDUSER", '0', time() + (86400 * 30) * 30, "/");
        if (!empty($page)) {
            return redirect()->route('account.login');
        } else {
            return redirect()->back();
        }
    }
    /*end Regester login*/
    // Dùng cho profile
    public function showProfile()
    {
        $user = 0;
        if (!empty($_COOKIE['IDUSER'])) {
            $user = DB::table('users')->where('username', $_COOKIE['IDUSER'])->get();
        }
        return view('profile.hoso', compact('user'));
    }
    // thông tin -- thây đổi thông tin
    public function profile(Request $request)
    {
        $username = trim($request->username);
        $fullname = trim($request->fullname);
        $email = trim($request->email);
        $phone = trim($request->phone);
        DB::table('users')->where('username', $username)->update(['fullname' => $fullname, 'email' => $email, 'phone' => $phone]);
        $message = "Cập nhập hồ sơ thành công";
        $user = DB::table('users')->where('username', $_COOKIE['IDUSER'])->get();
        return view('profile.hoso', compact('user', 'message'));
    }
    // end uplaod thông tin -- thây đổi thông tin
    public function upLoadFile(Request $request)
    {

        $message = 'Cập nhập ảnh đại diện thất bại';
        if ($request->hasFile('upLoadFile')) {
            $img = $request->file('upLoadFile');
            $id_img = uniqid() . '_' . uniqid() . '_' . ($img->getClientOriginalName());
            $img->move('avata', $id_img);
            $username = $request->username;
            $imgold =  DB::table('users')->where('username', $username)->get()[0]->avata;
            $linkold = $_SERVER['HTTP_ORIGIN'] . '/avata/' . $id_img;
            $path = '../avata/';
            DB::table('users')->where('username', $username)->update(['avata' => $linkold]);
            $message = 'Cập nhập ảnh đại diện thành công';

            $imgold = public_path('avata') . str_replace($_SERVER['HTTP_ORIGIN'] . '/avata', '', $imgold);

            if (file_exists($imgold)) {
                unlink($imgold);
            }
        }
        $user = 0;
        if (!empty($_COOKIE['IDUSER'])) {
            $user = DB::table('users')->where('username', $_COOKIE['IDUSER'])->get();
        };
        return view('profile.hoso', compact('user', 'message'));
    }


    //Show đon hang
    public function showdonhang(Request $request)
    {
        // set up thêm một số truy ván cho người dùng 
        if (!empty($_COOKIE["IDUSER"])) {
            $type = 0;
            if (!empty($request->type)) {
                if ($request->type == 1) {
                    $dbThanhToan = DB::table('thanhToan')
                        ->where('username', $_COOKIE['IDUSER'])
                        ->orderBy('ngayThanhToan', 'desc')
                        ->paginate(5);
                } elseif ($request->type == 2) {
                    $dbThanhToan = DB::table('thanhToan')
                        ->where('username', $_COOKIE['IDUSER'])
                        ->where('XacThuc', 1)
                        ->orderBy('ngayThanhToan', 'desc')
                        ->paginate(5);
                } elseif ($request->type == 3) {
                } elseif ($request->type == 4) {
                } elseif ($request->type == 5) {
                }
                $type = $request->type;
            } else {
                $dbThanhToan = DB::table('thanhToan')
                    ->where('username', $_COOKIE['IDUSER'])
                    ->paginate(5);
            }
        }
        $product_list = [];
        if (!empty($request->maDonHang)) {
            $maThanhToan = $request->maDonHang;
            $product_list = DB::table('donhang')
                ->where('donhang.maThanhToan', $maThanhToan)
                ->rightJoin('sanpham', 'sanpham.maSanPham', '=', 'donhang.maSanPham')
                ->get(['donhang.soLuong', 'donhang.maThanhToan', 'sanpham.tenSanPham', 'sanpham.priceSale', 'sanpham.imageSanPham']);
        }
        return view('profile.donhang', compact('dbThanhToan', 'type', 'product_list'));
    }

    public function showdoimatkhau()
    {
        $user = 0;
        if (!empty($_COOKIE['IDUSER'])) {
            $user = DB::table('users')->where('username', $_COOKIE['IDUSER'])->get();
        }
        return view('profile.doimatkhau', compact('user'));
    }
    public function handledoimatkhau(Request $request)
    {
        $user = [];
        $message = '';
        if (!empty($_COOKIE['IDUSER'])) {
            if ($request->username) {
                $username = trim($request->username);
                $passwordRE = md5(trim($request->passwordold));
                $passwordnew = md5(trim($request->password));
           
                $user = DB::table('users')->where('username', $username)->get();
                $passUsers = $user[0]->password;
                if ($passUsers === $passwordRE) {
                    DB::table('users')->where('username', $username)
                        ->update(['password' => $passwordnew]);
                    $message = "Cập nhập mật khẩu thành công cho tài khoảng " . $username;
                } else {
                    $message = "Mật khẩu của Tài Khoảng " . $username . " không chính sát";
                }
               
            }
        }
        
        return view('profile.doimatkhau', compact('user','message'));
    }
}
