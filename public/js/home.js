
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const api = [
    {
        id: 'MSP1252',
        img: "https://bizweb.dktcdn.net/thumb/medium/100/452/257/products/2e77693a-e559-4277-aba7-bdb637dea129.jpg?v=1655898378000",
        name: 'Rau mơ ngon',
        price_sale: 20125,
        price_orgin: 30014,
        des: "Sản phẩm tươi ngon tốt cho sức khỏe",
        status: 1,
        kind: "MLH01",
    }
]
function coverMoney(coin) {
    let dollarUSLocale = Intl.NumberFormat('en-US');
    return `${dollarUSLocale.format(Math.round(coin))} đ`
}
function sanphamPage(){
    return false;
};
// Hàm Tạo Id Ngẫu Nhiên
function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   return result;
}
// Hàm Sắp Xếp 2 obj
function compareValues(key, order = 'asc') {
    return function(a, b) {
      if(!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
        // nếu không tồn tại
        return 0;
      }
  
      const varA = (typeof a[key] === 'string') ?
        a[key].toUpperCase() : a[key];
      const varB = (typeof b[key] === 'string') ?
        b[key].toUpperCase() : b[key];
  
      let comparison = 0;
      if (varA >= varB) {
        comparison = 1;
      } else if (varA <= varB) {
        comparison = -1;
      }
      return (
        (order == 'desc') ? (comparison * -1) : comparison
      );
    };
  }  
// call api view sản phẩm nha
function output_product_views(data,home='',chose='') {
    if(!data) return false;
    if(chose){
        // hàm sắp xếp động
   
        switch(chose){
            case 'price_cre':
                api.sort(compareValues('price_sale', 'asc'));
               output_product_views(api,'nothome');
               buy_btn_list = $$('.chose_buy');
               button_buy_toast(buy_btn_list);
               sanphamPage();
                break;
            case 'price_dcr':
                api.sort(compareValues('price_sale', 'desc'));
               output_product_views(api,'nothome');
               buy_btn_list = $$('.chose_buy');
               button_buy_toast(buy_btn_list);
               sanphamPage();
                break;
            case 'name_cre':
                api.sort(compareValues('name', 'asc'));
               output_product_views(api,'nothome');
               buy_btn_list = $$('.chose_buy');
               button_buy_toast(buy_btn_list);
               sanphamPage();
                break;   
            case 'name_dcr':
                api.sort(compareValues('name', 'desc'));
               output_product_views(api,'nothome');
               buy_btn_list = $$('.chose_buy');
               button_buy_toast(buy_btn_list);
               sanphamPage();
                break; 
          default:
            output_product_views(api,'nothome');
             buy_btn_list = $$('.chose_buy');
            button_buy_toast(buy_btn_list);
            sanphamPage();

            
        }
     return 0;
    }
    let product_list_items = $('.product_list_items');
    let max = 0;
    localStorage.setItem('price_Max', 0);
    if (data && product_list_items) {
        let html = data.map((item) => {
            if (item.price_sale > max) max = item.price_sale;
            let saleof=Number(((1 - item.price_sale / item.price_orgin) * 100).toFixed(0));
            return `
                <div class="product_item l-3 m-4 c-6">
                        <div class="product_item_content">
                            <a href="chitiet/${makeid(5)}${item.id}-${makeid(10)}${item.status}-${item.kind}-${makeid(10)}"> <img
                                    src="${item.img}"
                                    alt=""></a>
                            <div class="product_item-des">
                                <p class="product_item-des_name">
                                ${item.name}
                                </p>
                                <p class="product_item-des_price">
                                    <span> ${coverMoney(item.price_sale)}</span><del>${coverMoney(item.price_orgin)}</del>
                                </p>
                            </div>
                            <button class="btn chose_buy"><i class="fa-solid fa-bag-shopping"></i> Chọn Mua</button>
                            <div class="product_item-saleoff_modal ${saleof>0?'':'hidden'}">
                                - <span>${saleof}</span> %
                            </div>
                            <input type="hidden" class="product_id" value="${item.id}">
                            <input type="hidden" class="product_price" value="${item.price_sale}">
                            <input type="hidden" class="product_kind" value="${item.kind}">
                        </div>
                    </div>
                `
        });
        let subhome=[];
        if(home==='home'){
            for(let i=0;i<8;i++){
                subhome.push(html[i]);
            }
            product_list_items.innerHTML = subhome.join('');
        }
       else product_list_items.innerHTML = html.join('');
        localStorage.setItem('price_Max', max);
        // seact Data here;
        search_data(data);
    }
}

function search_data(api) {
    console.log('Hello Nam');
    if (!api) return false;
    let seach_item_list = $('.seach_item_list');
    let seach_input = $('.seach_item input[name="search"]');
    let html_search = api.map(function (item) {

        return `
            <img class="cart_emtpy_search hide" src="../img/noitem.png"  alt="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDmiRBR_19JyGdceNZQ2iizUZcJWO53gWLUrkIlvTDAyTK_FBZcQvLNWfnluWoWEctpUE&usqp=CAU" />
            <a href="#" class="seach_item_list-box">
                <img src="${item.img}"
                                    alt="">
                <div class="seach_item_list-box_des">
                    <p class="seach_item_list-box_des-name">
                        ${item.name}
                    </p>
                     <p class="seach_item_list-box_des-price">
                        <span class="item_list-box_des-price"> ${coverMoney(item.price_sale)}</span> <del>135,245đ</del>
                    </p>
                </div>
            </a>
            `
    }).join('');
    seach_item_list.innerHTML = html_search;
    seach_input.addEventListener('input', function (e) {
        let a_seach_item_list = $$('.seach_item_list-box');
        let keywork = e.target.value;
        if (keywork) {
            let newlist
            seach_item_list.classList.remove('hide');
            for (let item of a_seach_item_list) {
                let name_item = item.querySelector('.seach_item_list-box_des-name').innerText;
                let price_item = item.querySelector('.item_list-box_des-price').innerText;
                name_item = String(name_item).toLowerCase();
                keywork = String(keywork).toLowerCase();
                price_item = String(price_item).toLowerCase();
                if (name_item.includes(keywork) || price_item.includes(keywork)) {
                    item.classList.remove('hide');

                }
                else {
                    item.classList.add('hide');

                }
                newlist = document.querySelector('.seach_item_list').innerText;
            }
            if (!newlist) {
                seach_item_list.querySelector('.cart_emtpy_search').classList.remove('hide');
            } else {
                seach_item_list.querySelector('.cart_emtpy_search').classList.add('hide');
            }
        }
        else {
            seach_item_list.classList.add('hide');

        }
    });
    document.onclick = function (e) {
        seach_input.value = '';
        seach_item_list.classList.add('hide');
    }
}
let headmenu = $('#headmenu_fixed');
let bannerElement = $('.headchange');
if (headmenu && bannerElement) {
    window.onscroll = function (e) {
        let rectmenu = bannerElement.getClientRects()[0];
        if (rectmenu.top <= 0) {
            headmenu.classList.add('open_fixed_pc');
        }
        else {
            headmenu.classList.remove('open_fixed_pc');
        }
    }
}
// gắn link sản phẩm chi tiết tại đây nha here herte ---------------
let buy_btn_list = $$('.chose_buy');
let toast = $('.toast');
button_buy_toast(buy_btn_list);
function button_buy_toast(buy_btn_list) {
    if (buy_btn_list) {
        for (let buy_btn of buy_btn_list) {
            buy_btn.addEventListener('click', function (e) {
                let item = e.target;
                if (!item.innerText.includes('Xem giỏ hàng')) {
                    item.innerText = "";
                    item.innerHTML = `<a href="/giohang" alt="">Xem giỏ hàng<i
                        class="fa-solid fa-arrow-right-long"></i></a>`;
                    if (item.closest('.product_item_content')) {
                        let parent_Item = item.closest('.product_item_content');
                        let nameItem = parent_Item.querySelector('.product_item-des_name').innerText;
                        let priceItem = parent_Item.querySelector('.product_item-des_price span').innerText;
                        let product_id = parent_Item.querySelector('input.product_id').value;
                        let product_kind = parent_Item.querySelector('input.product_kind').value;
                        // addd thêm thông tin tại đây cho giỏ hàng
                        priceItem = handPrice(priceItem);
                        let imgItem = parent_Item.querySelector('img').src;
                        cart_bag(product_id, nameItem, priceItem, imgItem, product_kind);
                        creattoast(nameItem, priceItem, imgItem);
                    }
                }
                // sự kiện load cart bag
                output_Bag_Heading();
            });
        }
    }
}
function getLocal() {
    if (localStorage.getItem('vegetable_bag')) {
        return JSON.parse(localStorage.getItem('vegetable_bag'));
    }
    return [];
}
function setLocal(item,soluong=1) {
    let vegetable_item_list = getLocal();
    if (vegetable_item_list) {
        let isAppear = vegetable_item_list.find(function (element) {
            return element.id === item.id;
        });
        if (isAppear) {
            for (let item of vegetable_item_list) {
                if (isAppear.id === item.id) {
                   item.amount+=Number(soluong);
                   
                    break;
                }
            }
        }
        else {
            vegetable_item_list.push(item);
        }

        localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list));
    }
    else {
        localStorage.setItem('vegetable_bag', JSON.stringify(item));
    }
}
function cart_bag(id, name, price, img, kind,amout=1) {
    let item = {
        'id': id,
        'name': name,
        'price': price,
        'img': img,
        'amount': amout,
        'kind': kind,
    };
    setLocal(item,amout);
    output_Bag_Heading();
}
function creattoast(name = '', price = 0, img = '') {
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
        <a href="#">${coverMoney(price)} </a>
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
function handPrice(number) {
    if (String(number).indexOf('đ')) {
        number = number.replaceAll('đ', '');
    }
    if (String(number).indexOf(',')) {
        number = number.replaceAll(',', '');
    }
    if (String(number).indexOf(' ')) {
        number = number.replaceAll(' ', '');
    }
    if (String(number).indexOf('%')) {
        number = number.replaceAll('%', '');
    }
    return Number(number);
}


output_Bag_Heading();
function output_Bag_Heading() {
    let bag_heading = getLocal();
    let container_heading = $('.cart_sub_list-box');
    let total = 0;
    let listbag_items = bag_heading.map(function (item) {
        total += item.price * item.amount;
        return `
            <a href="#" class="cart_box">
            <img src="${item.img}"
                alt="" />
            <div class="cart_box-des">
                <p class="cart_box-des-name">${item.name} - (${coverMoney(item.price)} )</p>
                <p class="cart_box-des-body">
                    <span class="cart_box-amount"><button
                            class="btn_decreate btn_chagne_cart"><i
                                class="fa-solid fa-minus"></i></button> <span>${item.amount}</span><button
                            class="btn_create btn_chagne_cart"><i
                                class="fa-solid fa-plus"></i></button> </span>
                    <span class="cart_box-price">${coverMoney(item.price * item.amount)}</span>
                </p>
                <input type="hidden" class="product_id" value="${item.id}">
                <input type="hidden" class="product_kind" value="${item.kind}">
            </div>
            <div class="close_item"><i class="fa-regular fa-circle-xmark"></i></div>
        </a>
            `;
    }).join('');
    //Cart_trống
    if (total == 0) {
        $('.cart_emtpy').classList.remove('hide');
        container_heading.innerHTML = '';
    }
    else {
        $('.cart_emtpy').classList.add('hide');

    }

    //-----------------------
    // output Sản phẩm 
    container_heading.innerHTML = listbag_items;
    // Số lượng sản phẩm
    let cart_total_amounts = $('.cart_total_amount p').innerText = bag_heading.length;
    // tổng giá trị sản phẩm
    let total_sub = $('.total_sub strong');
    total_sub.innerHTML = coverMoney(total);

    // sự kiện thêm sửa xóa thay đổi
    let cart_box_list = $$('.cart_sub_hover .cart_box');
    let list_btn_decreates = $$('.btn_decreate');
    let list_btn_creates = $$('.btn_create');
    let list_btn_close_bag = $$('.cart_box .close_item');
    hand_Event_Bag(list_btn_decreates, list_btn_creates, list_btn_close_bag);

    //funnc bên Giỏ Hàng
    if (output_pay()) {
        output_pay();
    }
    //funnc bên thahn toán 
    if (loadproduct_paymoney()) {
        loadproduct_paymoney();
    }
}
function output_pay() {
    return false;
};
function loadproduct_paymoney() {
    return false;
};
//------------------------------
//    thâm sửa xóa
//------------------------------
function hand_Event_Bag(list_btn_decreates, list_btn_creates, list_btn_close_bag, box_parent = '.cart_box', box_name = '.product_id') {
    let btn_decreates = list_btn_decreates;
    let btn_creates = list_btn_creates;
    let btn_close_bag = list_btn_close_bag;
    let vegetable_item_list = getLocal();
    // giảm số lượng
    btn_decreates.forEach((btn_dec) => {
        btn_dec.onclick = function () {
            if (this.closest(box_parent)) {
                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).value;
                for (let item in vegetable_item_list) {
                    if (nameItem === vegetable_item_list[item].id) {
                        vegetable_item_list[item].amount--;
                        if (vegetable_item_list[item].amount == 0) {
                            vegetable_item_list.splice(item, 1);
                        }
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
            }
        };
    });
    // tăng số lượng
    btn_creates.forEach((btn_cre) => {
        btn_cre.onclick = function () {
            if (this.closest(box_parent)) {
                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).value;
                for (let item of vegetable_item_list) {
                    if (nameItem === item.id) {
                        item.amount++;
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
            }
        };
    });
    // xóa
    btn_close_bag.forEach((btn_close) => {
        btn_close.onclick = function () {
            if (this.closest(box_parent)) {
                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).value;
                for (let item of vegetable_item_list) {
                    if (nameItem === item.id) {
                        vegetable_item_list.splice(item, 1);
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
            }
        };
    });
}
// Valdieta form
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
}