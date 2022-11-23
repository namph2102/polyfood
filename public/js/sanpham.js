sanphamPage();
function sanphamPage() {
    const input_fillter = document.querySelector('.input_fillter');
    const product_list_items =  document.querySelectorAll('.product_list_items .product_item ');
    // ô lọc sản phẩm sap xếp sản phẩm 
    // khi kéo chuột ở input range lọc giá
    mouse_event_range();
    function mouse_event_range() {
      let prict_max_Element = document.querySelector('.prict_max');
        let prict_max = localStorage.getItem('price_Max');
        prict_max_Element.innerText=coverMoney(prict_max);
        if (prict_max) {
            input_fillter.addEventListener('mousemove', function (e) {
                let value_input = e.target.value;
                prict_max_Element.innerText = coverMoney(((value_input * prict_max) / 100).toFixed(0))
            });
            input_fillter.addEventListener('mouseup', function (e) {
                let new_value_input =prict_max_Element.innerText;
                new_value_input=handPrice(new_value_input);
               
                for(var item of product_list_items){
                    let price_item=item.querySelector('.product_item-des_price span').innerText;
                  if(handPrice(price_item) && handPrice(price_item)>new_value_input){
                     item.classList.add('hiden');
                  }
                  else{
                    item.classList.remove('hiden');
                  }
                }
            });
        }
    }
   return true;
};

document.querySelector('.fillter_product_find').addEventListener('change',function(e){
  let chose=e.target.value;
  if(chose){
   output_product_views(phantrang,'nothome',e.target.value);
  }
 });