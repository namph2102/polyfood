loadproduct_paymoney();
search_data(api);
function loadproduct_paymoney() {
    let $ = document.querySelector.bind(document);
    let $$ = document.querySelectorAll.bind(document);
    let ul_container = $('.ul_container');
    let list_product_local = getLocal();
    let total = 0;
    $('.badge-pill').innerText = list_product_local.length;
    let max = 1;
    let maChuyenKhoang = `TT${makeid(8)}`;
    document.querySelector('.maChuyenKhoang').innerText = maChuyenKhoang;
    let html_pay = list_product_local.map(function (item, index) {
        total += item.price * item.amount;
        if (Number(item.id) > max) max = item.id;
        return `
         <input type="hidden" name="donhang${item.id}" value="${item.id}-${item.amount}" />
         <li class="list-group-item">
             <div class="l-8 m-6 c-6">
                 <h6 >${item.name}</h6>
                 <small>${coverMoney(item.price)} x ${item.amount}</small>
             </div>
             <span class="total_item_paymoney">${coverMoney(item.price * item.amount)}</span>
         </li>     
        `}).join('');
    ul_container.innerHTML = ` ${html_pay} <input type="hidden" name="maxID" value="${max}"/><input type="hidden" name="maThanhToan" value="${maChuyenKhoang}" />`;

    if (total >= 1000000) {
        $('.vat_value').innerText = '10 %'
    }
    else {
        $('.vat_value').innerText = '5 %'
    }
    let vat_value = $('.vat_value').innerText;
    let ship_code_value = $('.ship_code_value').innerText;
    vat_value = handPrice(vat_value);
    ship_code_value = handPrice(ship_code_value);
    $('.total_ship').value = ship_code_value;
    $('.total_vat').valuevat_value;
    $('.total_paymoney').value = ship_code_value + total + (total * vat_value / 100);
    $('.subtotal_code_value').innerText = coverMoney(total);
    $('.total_value').innerText = coverMoney(ship_code_value + total + (total * vat_value / 100));

    return true;
}


validator_Form_pay();
function error_input(element, classerror, meassage = '') {
    element.querySelector(classerror).classList.add('error');
    element.querySelector('.meassage').innerText = meassage;
}
function remove_error(element, classerror) {
    element.querySelector(classerror).classList.remove('error');
    element.querySelector('.meassage').innerText = '';
}
function validator_Form_pay() {
    let list_box_message = $$('.box_message');
    list_box_message.forEach(item => {
    });
    list_box_message.forEach(item => {
        let input_item = item.querySelector('input');
        input_item.addEventListener('blur', function (e) {
            if (!e.target.value) {
                error_input(item, 'fieldset', 'Trường này không được để trống!');
            }
            else {
                remove_error(item, 'fieldset');
            }
        });
        input_item.addEventListener('input', function (e) {
            remove_error(item, 'fieldset');
        });
    });
    const url = 'https://provinces.open-api.vn/api/?depth=3';
    const address_tinh = $('#address_tinh');
    const address_huyen = $('#address_huyen');
    const address_xa = $('#address_xa');
    fetch(url)
        .then((res) => res.json())
        .then((data) => {
            // Địa chỉ có rồi thì thôi
            if (data) {
                let arr__huyen = '';
                let arr__xa = '';
                let html_tinh = '';
                if ($('#address_tinh').value) {
                    html_tinh = $('#address_tinh').innerHTML;
                }
                else html_tinh = '<option value="">Tỉnh /Thành phố</option>';
                html_tinh += data.map((tinh) => {
                    return `
                    <option data-tinh="${tinh.code}" value="${tinh.name}">${tinh.name}</option>`
                }).join('');
                address_tinh.innerHTML = html_tinh;
                address_tinh.addEventListener('change', function (e) {
                    change_address()
                    let name_tinh = e.target.value;
                    $('.position_tinh').value = name_tinh;
                    $('.address_ship').innerText = name_tinh;
                    if (name_tinh === 'Thành phố hồ chí minh') {
                        $('.ship_code_value').innerText = '0 đ';
                        $('.price_ship_address').innerText = '0 đ';
                        loadproduct_paymoney();
                    }
                    else if (name_tinh == 'Thành phố Hà Nội') {
                        $('.ship_code_value').innerText = '50,000 đ';
                        $('.price_ship_address').innerText = '50,000 đ';
                        loadproduct_paymoney();
                    }
                    else {
                        $('.ship_code_value').innerText = '35,000 đ';
                        $('.price_ship_address').innerText = '35,000 đ';
                        loadproduct_paymoney();
                    }
                    let html_huyen = '<option value="">Quận / Huyện</option>';
                    arr__huyen = data.find(huyen => {
                        return (name_tinh === huyen.name)
                    });
                    if (arr__huyen) {

                        html_huyen += arr__huyen.districts.map(huyen => {
                            return ` <option data-huyen="${huyen.code}" value="${huyen.name}">${huyen.name}</option>`;
                        }).join('');
                        arr__huyen = arr__huyen.districts;// ;ấy dữ liệu cho xã
                        address_huyen.innerHTML = html_huyen;

                    }
                });

                address_huyen.addEventListener('change', function (e) {

                    change_address()
                    let name_huyen = e.target.value;
                    let html_xa = '<option value="">Xã /Thị Trấn</option>';

                    $('.position_huyen').value = name_huyen;


                    arr__xa = arr__huyen.find(xa => {
                        return name_huyen == xa.name;
                    });

                    html_xa += arr__xa.wards.map(xa => {
                        return ` <option data-xa="${xa.code}" value="${xa.name}">${xa.name}</option>`;
                    }).join('');
                    address_xa.innerHTML = html_xa;
                    address_xa.addEventListener('change', function (e) {
                        change_address()
                        let name_xa = (e.target.value);
                        $('.position_xa').value = name_xa;
                    });

                });

            }
            else {
                let name_tinh = $('#address_tinh').value;
                if (name_tinh === 'Thành phố hồ chí minh') {
                    $('.ship_code_value').innerText = '0 đ';
                    $('.price_ship_address').innerText = '0 đ';
                    loadproduct_paymoney();
                }
                else if (name_tinh == 'Thành phố Hà Nội') {
                    $('.ship_code_value').innerText = '50,000 đ';
                    $('.price_ship_address').innerText = '50,000 đ';
                    loadproduct_paymoney();
                }
                else {
                    $('.ship_code_value').innerText = '35,000 đ';
                    $('.price_ship_address').innerText = '35,000 đ';
                    loadproduct_paymoney();
                }
            }
        })

    function change_address() {
        let addres = `Địa Chỉ :${$('#kh_address').value} ,${$('#address_xa').value} ,${$('#address_huyen').value} ,${$('#address_tinh').value}`
        $('.container_ifm_howtopay address').innerHTML = addres;

    }
    function add_hidden_radio() {
        let list_httt_ma = $$('.httt_ma');
        list_httt_ma.forEach(pay => {
            let parent_item = pay.closest('.custom-radio');
            parent_item.querySelector('.container_ifm_howtopay').classList.add('hidden');

        })
    }
    // Xử lý thanh toán shipcode chuyển khoảng tiền mặt
    let list_httt_ma = $$('.httt_ma');
    let name_ship = $('.ship_code_chose');
    function changeAddres() {

    }
    list_httt_ma.forEach(pay => {
        pay.addEventListener('change', function (e) {
            let item = e.target;
            let parent_item = item.closest('.custom-radio');
            add_hidden_radio();
            parent_item.querySelector('.container_ifm_howtopay').classList.remove('hidden');
            if (item.className.includes('httt_ma_tienmat')) {

            }
            $('.ship_code_value').innerText = $('.price_ship_address').innerText;
            loadproduct_paymoney();

        });
    })

    //end thanh toán
}
getLocation();
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(setPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function setPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    $('.position_latitude').value = latitude;
    $('.position_longitude').value = longitude;
}
myFunction();

function myFunction() {
    var form_selecter = document.querySelector("#mySelect");
    let dathang = document.querySelector('#dathang');
    let dathang_fast = document.querySelector('#dathang_fast');
    dathang_fast.onclick = function () {
        let ves = getLocal();
        if ($('#kh_email').value && $('#kh_phone').value && $('#kh_email').value && $('#address_xa').value && $('#kh_ten').value) {
        }
        else {
            modal('Thông Báo', 'Lưu Ý', 'Quý khách Vui Lòng nhập đầy đủ thông tin để đặt hàng', 2000);
            return false;
        }
        if (!ves.length) {
            modal('Lưu Ý', 'Giỏ Hàng Trống', 'Quý khách Vui Lòng mua hàng hóa để thanh toán');
        }
        if (ves.length > 0) {
            if ($('#kh_email').value && $('#address_xa').value) {
                loading('Đợi Giây lát...');
                setTimeout(() => {
                    form_selecter.submit();
                }, 2000);
            }
        }
    }
    dathang.onclick = function () {
        let ves = getLocal();
        if ($('#kh_email').value && $('#kh_phone').value && $('#kh_email').value && $('#kh_address').value && $('#kh_ten').value) {
        }
        else {
            modal('Thông Báo', 'Lưu Ý', 'Quý khách Vui Lòng nhập đầy đủ thông tin để đặt hàng', 2000);

        }
        if (!ves.length) {
            modal('Lưu Ý', 'Giỏ Hàng Trống', 'Quý khách Vui Lòng mua hàng hóa để thanh toán');
        }
        if (ves.length > 0) {
            if ($('#kh_email').value && $('#address_xa').value) {
                loading('Đợi Giây lát...');
                setTimeout(() => {
                    form_selecter.submit();
                }, 2000);
            }
        }
    }
    return false;
}
if('#address_xa'.value){
    $('#kh_address').innerHTML=`${$("#kh_address").value} ,${$("#address_xa").value} ,${$("#address_huyen").value} ,${$("#address_tinh").value}`;
}