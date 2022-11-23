let btn_dcr = $('.qtyminus');
let btn_cre = $('.qtyplus');
let quantity = $('.quantity');
let btn_buynow = $('.btn_buynow');
function changeImage(a) {
    if(a.src){
        $('.item_detail_view_heading img').src = a.src;
    }
 
}
outOfStock();
function outOfStock() {
    let outOfStock = $('.outOfStock').value;
    // status
    let status_content = $('.status_content');
    if (outOfStock == 0) {
        status_content.classList.add('outOfStock');
        $('.status_des').innerText = "Hết Hàng";
    }
    else {
        status_content.classList.remove('outOfStock');
        $('.status_des').innerText = "Còn Hàng";
    }
}
if (localStorage.getItem('id_chitiet')) {
    let namrproduct = $('.idProduct').value;
    if (namrproduct == localStorage.getItem('id_chitiet')) {
        quantity.value = localStorage.getItem('amount_chitiet');
    }
}
else {
    quantity.value = 1;

}
sanphamchitiet();
function sanphamchitiet() {
    let idproduct = $('.idProduct').value;
    btn_dcr.onclick = function () {
        let amount = quantity.value;
        amount--;
        if (amount == 0) quantity.value = 1;
        else quantity.value = amount;
        localStorage.setItem('id_chitiet', idproduct);
        localStorage.setItem('amount_chitiet', quantity.value);
    }
    btn_cre.onclick = function () {
        let amount = quantity.value;
        amount++;
        quantity.value = amount;
        localStorage.setItem('id_chitiet', idproduct)
        localStorage.setItem('amount_chitiet', quantity.value);
    }
    btn_buynow.onclick = function () {
        const list_bag = getLocal();
        let item_bag = list_bag.find(item => {
            return item.id == idproduct;
        })
        // add sản phẩm mới vào giỏ hàng;
        let image = $('.item_detail_view_heading img').src;
        let name = $('.item_detail_ifm_name').innerText;
        let price = $('.item_detail_ifm_price').innerText;
        price = handPrice(price);
        let amount = Number(quantity.value);
        let id = $('.idProduct').value;
        let kind = $('.kindProduct').value;
        creattoast(name, price, image, amount);
        cart_bag(id, name, price, image, kind, amount)
        quantity.value = 1;
        localStorage.setItem('id_chitiet', id)
        localStorage.setItem('amount_chitiet', quantity.value);
    }
}
function creattoast(name = '', price = 0, img = '', amount = 1) {
    let toast_item = document.createElement('div');
    toast_item.className = 'toast_item';
    toast_item.innerHTML = `
    <div class="toast_heading">
    <div class="toast_message">Sản phẩm đã thêm vào giỏ hàng</div>
    <i class="fa-solid fa-circle-xmark"></i>
</div>
<figure>
    <img src="${img}"
        alt="">
    <div class="toat_ifm">
        <figcaption>${name}</figcaption>
        <a href="#">${coverMoney(price)} x ${amount} </a>
    </div>
</figure>
    `;

    setTimeout(function () {
        toast_item.classList.toggle('active');
        toast.appendChild(toast_item);
    }, 200)
    setTimeout(function () {
        toast_item.classList.toggle('active');
    }, 2000)
    setTimeout(function () {
        toast_item.remove();
    }, 4000)
}
validator_Form_pay();
