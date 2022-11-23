@extends('layoutMaster.layoutProduct')
@section('title')
Giới Thiệu
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/paymoney.css')}}">
<link rel="stylesheet" href="{{asset('css/lienhe.css')}}">
@endsection
<style>
    .title-head {
        font-size: 2.8rem;
    color: #333;
    font-weight: 600;
    text-decoration: none;
    margin: 32px 0;
    } 
    .about_us .about_us_des{
        font-size: 1.8rem;
    color: rgba(0,0,0,0.7);
    letter-spacing: 1.25px;
    font-weight: 600;
    }
</style>
@section('directional')
    <a>giới thiêu</a>
@endsection
@section('container')
<div class="product_items_special">
    
    <div class="grid wide">
        <div class="product_items_directional l-12 c-12 m-12">
            <div class="direce_page_heading">
                <h1>Giới Thiệu</h1>
            </div>
        </div>
        <div class="about_us">
            <h2 class="title-head" ><strong>CÂU CHUYỆN CỦA CHÚNG TÔI</strong> </h2>
            <p class="about_us_des">
                <b>PolyFresh</b> cửa hàng thực phẩm sạch với mục tiêu giúp người tiêu dùng Việt Nam có một cuộc sống
                khỏe mạnh hơn thông qua những loại thực phẩm hữu cơ có chứng nhận, thực phẩm tự nhiên. Chúng tôi lựa
                chọn các loại thực phẩm hữu cơ, thực phẩm tự nhiên từ các nhà sản xuất, các công ty trong và ngoài
                nước thông qua quá trình lựa chọn kỹ càng về khả năng cung ứng, các giấy chứng nhận tiêu chuẩn do
                các tổ chức uy tín thế giới cấp. Chúng tôi yêu thích những gì chúng tôi làm và chúng tôi đam mê
                những lợi ích của một lối sống lành mạnh, tìm nguồn cung cấp sản phẩm hữu cơ chất lượng cao nhất cho
                khách hàng và cung cấp dịch vụ giao hàng tận nhà tốt nhất. Chúng tôi hoàn toàn tin tưởng rằng những
                sản phẩm tạo ra từ quá trình canh tác và sản xuất theo phương thức hữu cơ và tự nhiên tốt cho cơ thể
                mọi người, tốt hơn cho cộng đồng và tốt hơn cho hành tinh mà chúng ta đang sống. Một lần nữa, Farm
                House được sáng lập bởi các nhà sáng lập muốn tạo dựng một cộng đồng thực phẩm sạch, dựa trên nền
                tảng hữu cơ và thuần từ thiên nhiên, nhằm mang lại sức khoẻ tốt nhất cho cộng đồng.
            </p>
        </div>
        <div class="about_us">
            <h2 class="title-head">I. SỨ MỆNH KINH DOANH </h2>
            <p class="about_us_des">
                Sứ mệnh của <strong>PolyFresh</strong> và đó là giúp mọi người dễ dàng tiếp cận hơn với các loại thực phẩm sạch, thực
                phẩm hữu cơ, thực phẩm tự nhiên. Không chỉ cung cấp các sản phẩm hữu cơ, chúng tôi còn đem đến những
                thông tin hữu ích về sức khỏe mà thực phẩm hữu cơ đem lại cho con người và cộng đồng. Mỗi người có
                nhu cầu và cách tiếp cận với thực phẩm hữu cơ, thực phẩm tự nhiên theo một cách khác nhau, vì vậy,
                chúng tôi có mặt ở đây để hỗ trợ bạn bằng cách: Chỉ cung cấp những loại thực phẩm hữu cơ, thực phẩm
                tự nhiên đạt những chứng nhận uy tín nói chung và được kiểm chứng bởi <strong>PolyFresh</strong> nói riêng. Khởi tạo
                những mối quan hệ tích cực, lâu dài và tin tưởng giữa <strong>PolyFresh</strong> với khách hàng, nhân viên, nhà cung
                cấp và cộng đồng. Hỗ trợ phát triển các trang trại, cộng đồng nhỏ vùng sâu vùng xa, vùng dân tộc ít
                người và các đối tượng dễ bị tổn thương trong xã hội canh tác theo phương thức hữu cơ, phương thức
                tự nhiên để có cuộc sống tốt đẹp hơn.
            </p>
        </div>
        <div class="about_us">
            <h2 class="title-head">II. LAN TOẢ ĐIỀU TỐT VÀ NHIỀU HƠN NỮA LUÔN TƯƠI NGON </h2>
            <p class="about_us_des">
                Là khách hàng của <strong>PolyFresh</strong>e bạn không cần phải dành hàng giờ đi chợ hay siêu thị để tìm kiếm những
                sản phẩm hữu cơ tươi ngon nhất vì chúng tôi làm điều đó cho bạn và sau đó đưa bạn đến tận nhà bạn.
                Chúng tôi chọn những sản phẩm hữu cơ tươi mới và có chứng nhận. Trong quá trình đóng gói của chúng
                tôi, chúng tôi cũng đảm bảo rằng chất lượng của tất cả các sản phẩm được kiểm tra thêm để sản phẩm
                được giao là tiêu chuẩn tốt nhất.
            </p>
        </div>
        <div class="about_us">
            <h2 class="title-head">III. DỊCH VỤ CSKH TUYỆT VỜI </h2>
            <p class="about_us_des">
                Nhiệm vụ của chúng tôi là cung cấp dịch vụ tốt nhất cho khách hàng, giúp bạn tận hưởng trải nghiệm
                mua sắm tuyệt vời nhất. Chúng tôi thích tương tác với khách hàng của mình và chúng tôi luôn hoan
                nghênh phản hồi về dịch vụ của các bạn. Đó là cách mà chúng tôi hiểu các bạn hơn, cũng như làm tốt
                dịch vụ của mình hơn, hoàn thiện mình hơn nữa từng gày.
            </p>
        </div>
        <div class="about_us">
            <h2 class="title-head">IV. TRÊN CẢ MONG MUỐN </h2>
            <p class="about_us_des">
                Chúng tôi thích quảng bá các thực phẩm hữu cơ bổ dưỡng và giảm thiểu càng nhiều thực phẩm chế biến
                càng tốt. Dù thực phẩm bạn chọn cho bạn và gia đình của bạn là gì, thì chúng tôi vẫn khẳng định rằng
                thực phẩm hữu cơ là hỗ trợ lối sống lành mạnh nhất. Thực phẩm hữu cơ mặc dù chưa được nhiều người
                biết đến, nhưng nó càng ngày được nhiều người tin dùng vì nó thực sự tốt cho sức khoẻ của bạn và gia
                đình.
            </p>
        </div>
        <div class="about_us">
            <h2 class="title-head">V. GIÁ TRỊ THỰC SỰ </h2>
            <p class="about_us_des">
                Hầu hết các sản phẩm chúng tôi cung cấp được chứng nhận hữu cơ ngoài ra một số can tác theo hướng
                hữu cơ, thuần tự nhiên, nơi chúng tôi cũng có một số người trồng địa phương do đó bạn có thể yên tâm
                rằng tất cả các quy trình và hệ thống của chúng tôi đều được kiểm tra nghiêm ngặt.
            </p>
        </div>
        <div class="about_us">
            <h2 class="title-head"> VI. PHÁT TRIỂN BỀN VỮNG </h2>
            <p class="about_us_des">
                Canh tác hữu cơ đang ngày một tốt hơn cho hành tinh của chúng ta. Chúng tôi tìm đến những địa phương
                nơi mà đang có nguồn đất, nước, khí không nhiễm bẩn để xây dựng hệ sinh thái tốt, chúng tôi đã vạch
                ra con đường tốt nhất để tiết kiệm khí thải. Chúng tôi giữ lượng chất thải tối thiểu bằng các phế
                liệu thực phẩm được tặng cho cư dân địa phương để ủ phân và thức ăn cho vật nuôi. Hộp của chúng tôi
                có thể được sử dụng lại và chúng tôi yêu cầu khách hàng đổi lại hộp giấy trong lần mua hàng kế tiếp.
            </p>
        </div>

    </div>
</div>
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
$apiSanpham=json_encode($listapiSanpham);
@endphp
@section('api')
<script>
    api='<?php echo $apiSanpham; ?>';
    api=JSON.parse(api);
</script> 
@endsection
@section('js')
<script src="../js/lienhe.js"></script>
@endsection
