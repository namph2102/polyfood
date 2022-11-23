
output_pay();
function output_pay() {
    let list_product = getLocal();
    let container_cart_bag_list_item = $('.cart_bag_list_item');
    let total = 0;
    if (list_product) {
        let html = list_product.map(function (item) {
            total += item.price * item.amount;
            let loahiang = "Rau Củ";
            switch (Number(item.kind)) {
                case 1:
                    loahiang = "Rau Củ";
                    break;
                case 2:
                    loahiang = "Hải Sản";
                    break;
                case 3:
                    loahiang = "Trái Cây";
                    break;
                case 4:
                    loahiang = "Đồ Uống";
                    break;
                case 5:
                    loahiang = "Thịt Trứng";
                    break;
                default:
                    loahiang=item.kind;
                    break;
                
            }
            return `
                <tr class="box_item_container_list">
                <td class="table_product_cart_item">
                    <a class="product_cart_item_img" href="#">
                        <img src="${item.img}"
                            alt="" />
                        <div class="product_box_item_ifm">
                            <div class="cart_box-des-name">
                             ${item.name}
                            </div>
                            <div class="product_box_item_name-origin">
                            ${(loahiang)}
                            </div>
                        </div>
                    </a>
                </td>
                <td class="product_box_item_ifm-price">
                    ${coverMoney(item.price)}
                </td>
                <td class="product_box_item_ifm-btn_controller">
                    <button class="btn_ifm_bag btn_ifm_bag_des"><i class="fa-solid fa-minus"></i></button> <span
                        class="product_box_item_ifm-amount">  ${item.amount}</span> <button class="btn_ifm_bag btn_ifm_bag_cre"><i
                            class="fa-solid fa-plus"></i></button>
                </td>
                <td class="product_box_item_ifm-total">
                ${coverMoney(item.price * item.amount)}
                </td>
                <td class="product_box_item_ifm-close">
                    <button class="btn_ifm_bag_times"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
                `;
        }).join('');
        container_cart_bag_list_item.innerHTML = html;
        let list_btn_dec = $$('.btn_ifm_bag_des');
        let list_btn_cre = $$('.btn_ifm_bag_cre');
        let list_btn_close = $$('.btn_ifm_bag_times');
        hand_Event_Bag_list(list_btn_dec, list_btn_cre, list_btn_close, '.box_item_container_list', '.cart_box-des-name');

    }
    $('.box_bill_pay-subtotal_coin').innerText = coverMoney(total);
    if (total >= 1000000) {
        $('.box_bill_pay-subtotal_vat').innerText = '10 %';
    }
    else {
        $('.box_bill_pay-subtotal_vat').innerText = '5 %';
    }
    let subtotal_vat = $('.box_bill_pay-subtotal_vat').innerText;
    subtotal_vat = Number(subtotal_vat.replace(' %', ''));
    $('.box_bill_pay-total_coin').innerText = coverMoney(Math.round(total + total * (subtotal_vat / 100)));
    return 'cart';

}
function hand_Event_Bag_list(list_btn_decreates, list_btn_creates, list_btn_close_bag, box_parent, box_name) {
    let btn_decreates = list_btn_decreates;
    let btn_creates = list_btn_creates;
    let btn_close_bag = list_btn_close_bag;
    let vegetable_item_list = getLocal();
    // giảm số lượng
    btn_decreates.forEach((btn_dec) => {
        btn_dec.onclick = function () {

            if (this.closest(box_parent)) {

                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).innerText;

                for (let item in vegetable_item_list) {
                    if (nameItem === vegetable_item_list[item].name) {
                        vegetable_item_list[item].amount--;
                        if (vegetable_item_list[item].amount == 0) {
                            vegetable_item_list.splice(item, 1);
                        }
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
                output_pay();
            }
        };
    });
    // tăng số lượng
    btn_creates.forEach((btn_cre) => {
        btn_cre.onclick = function () {

            if (this.closest(box_parent)) {
                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).innerText;
                for (let item of vegetable_item_list) {
                    if (nameItem === item.name) {
                        item.amount++;
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
                output_pay();
            }
        };
    });
    // xóa
    btn_close_bag.forEach((btn_close) => {
        btn_close.onclick = function () {

            if (this.closest(box_parent)) {
                let parentItem = this.closest(box_parent);
                let nameItem = parentItem.querySelector(box_name).innerText;
                for (let item of vegetable_item_list) {
                    if (nameItem === item.name) {
                        vegetable_item_list.splice(item, 1);
                        break;
                    }
                }
                localStorage.setItem('vegetable_bag', JSON.stringify(vegetable_item_list))
                output_Bag_Heading();
                output_pay();
            }
        };
    });
}