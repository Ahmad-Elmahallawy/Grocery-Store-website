function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "results.xml", false);
    xhttp.send();
    myFunction(xhttp);//(this);
}
function myFunction(xml)
{
    var xmlDoc = xml.responseXML;
    var parser = new DOMParser();
    var xmlDoc = parser.parseFromString(xml.responseText, "application/xml");
    var x;    
    var txt = "";
    var y;
    y = xmlDoc.getElementsByTagName("entryresult");//.childNodes[0];
    x = y[1].getElementsByTagName("title")[0].childNodes[0].nodeValue;
    alert(x);
}

// Reads the products from the XML file
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ()=>
    {
        let url = "Products/products.xml";
        fetch(url)
        .then(function(resp) 
        {
            return resp.text();
            console.log(resp.text)
        })
        .then(function(data) {
            let parser = new DOMParser();
            var xml = parser.parseFromString(data, "text/xml");
            console.log("test");
            console.log(xml);
            buildShoppingCart(xml);
            ready();
        })
    })
}
else {
    ready();

}

function ready() {
        /* remove button */
        var removeCartItemButtons = document.getElementsByClassName('product-remove')
        console.log(removeCartItemButtons)
        for (var i = 0; i < removeCartItemButtons.length; i++) {
            var removebtn = removeCartItemButtons[i]
            console.log(removebtn);
            // on click event listener 
            removebtn.addEventListener('click',function(event) {
                var buttonClicked = event.target;       
                buttonClicked.parentElement.parentElement.remove();
                var name = buttonClicked.parentElement.parentElement.getElementsByTagName('h3')[0].innerHTML;
                console.log(String(0))

                var xhr = new XMLHttpRequest();
                xhr.open('POST', './updateInventory.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    console.log(this.responseText);
                };
                xhr.send('name='+  name +  '&value=' + '0');
                updateCartTotal();
            });
        }

        /* product quantity input */
        var quantityInputs = document.getElementsByClassName('product-quantity-input')
        for (var i = 0; i < quantityInputs.length; i++) {
            var input = quantityInputs[i];
            // on change event listener
            input.addEventListener('change', function(event) {

                
                var input = event.target;
                if (isNaN(input.value) || input.value <= 0) {
                    input.value = 1;
                }
                
                /**************** New ***************** */
                var itemName = input.parentElement.parentElement.getElementsByClassName('product-name')[0].innerHTML;
                console.log(typeof(input.value))
                var xhr = new XMLHttpRequest();
                xhr.open('POST', './updateInventory.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    console.log(this.responseText);
                };
                xhr.send('name='+  itemName +  '&value=' + input.value);
                /***************************************/

                updateCartTotal();
                
        });
    }
}             

// Builds the list/table with the products inside
function buildShoppingCart(x)
{
let list = document.getElementById('cart-productsID');
console.log(list);
let products = x.getElementsByTagName('info');
console.log(products);
    for(let i = 0; i<products.length; i++)
    {
        let div = document.createElement('div');
        let productName = products[i].children[1].innerHTML,
            productPrice = products[i].children[2].innerHTML,
            productImage = products[i].children[0].innerHTML,
            productQuantity = products[i].children[3].innerHTML;
        let productContent = 
        `<div class="product">
                    <img name="p-image" src="${productImage}">
                    <div class="product-info">
                        <h3 class="product-name" name="p-name">${productName}</h3>
                        <h4 class="product-price" name ="p-price">$${productPrice}</h4>
                        <p class="product-quantity"> Quantity: 
                        <input class="product-quantity-input" name="p-quantity" type="number" value="${productQuantity}" step="1">
                        </p>
                        <button type="button" class="product-remove" name='p-remove'>Remove</button>
                    </div>
                </div>`
        
        div.innerHTML = productContent;
        list.append(div);
        updateCartTotal();
    }
}

function updateCartTotal() {
    var cartProductsContainer = document.getElementById('cart-productsID');
    var cartProducts = cartProductsContainer.getElementsByClassName('product');
    var subtotal = 0;
    var numItems = 0;
    var qst = 0;
    var gst = 0;
    var total = 0;
    for (var i = 0; i < cartProducts.length; i++) {
        var product = cartProducts[i];
        var priceElement = product.getElementsByClassName('product-price')[0];
        var quantityElement = product.getElementsByClassName('product-quantity-input')[0];
        var price = parseFloat(priceElement.innerText.replace('$', ''));
        var quantity = quantityElement.value;
        subtotal = subtotal + (price * quantity);
        numItems = numItems + parseInt(quantity);
    }
    subtotal = Math.round(subtotal * 100) / 100;
    gst = Math.round(0.05 * subtotal * 100) / 100;
    qst = Math.round(0.09975 * subtotal * 100) / 100;
    total = subtotal + gst + qst;
    document.getElementsByClassName('subtotal-price')[0].innerText = '$' + subtotal.toFixed(2);
    document.getElementsByClassName('total-items')[0].innerText = numItems;
    document.getElementsByClassName('gst-price')[0].innerText = '$' + gst.toFixed(2);
    document.getElementsByClassName('qst-price')[0].innerText = '$' + qst.toFixed(2);
    document.getElementsByClassName('total-price')[0].innerText = '$' + total.toFixed(2);
}