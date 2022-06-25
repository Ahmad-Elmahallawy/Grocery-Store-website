// Reads the products from the XML file

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
            let xml = parser.parseFromString(data, "text/xml");
            console.log(xml);
            xmlDoc = xml;
            //refresh(xml);
            buildShoppingCart(xml);
            ready(xml);
        });
});

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
                    <p class="product-remove" >Remove</p>
                </div>
            </div>`
    
    div.innerHTML = productContent;
    localStorage.setItem(productName,productQuantity);
    //console.log(productName);
    //console.log(JSON.stringify([productPrice,productQuantity]));
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

function ready(x) 
    {
    //let removed = [];
    /* remove button */
    var removeCartItemButtons = document.getElementsByClassName('product-remove')
    console.log(removeCartItemButtons)
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var removebtn = removeCartItemButtons[i]
        console.log(removebtn);
        removebtn.addEventListener('click',function(event) {
            var buttonClicked = event.target;
            //var deletedNode = x.getElementsByTagName("product");
            var name =buttonClicked.parentElement.parentElement.getElementsByTagName('h3')[0].innerHTML;
            //removed.push(name);
            //console.log(removed);
            removeXML(name);
            buttonClicked.parentElement.parentElement.remove();
            updateCartTotal();
        });
    }
    let quanitityChanged = {};
    /* product quantity input */
    var quantityInputs = document.getElementsByClassName('product-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', function(event) {
          var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    //var name =input.parentElement.getElementsByTagName('')[0].innerHTML;
    var itemName = input.parentElement.parentElement.getElementsByClassName('product-name')[0].innerHTML;
    quanitityChanged[itemName] = input.value;
    console.log(itemName);
    console.log(input.value)
    editXML(itemName, input.value);
    updateCartTotal();
        })
}
};

function editXML(itemName, value) {
    var x;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "Products/products.xml" , true);
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        xmlDoc = this.responseXML;
        x = xmlDoc.getElementsByTagName("name");
        console.log(x);
        // remove
        for (var i=0; i<x.length;i++) {
          if (x[i].innerHTML == itemName) {
            xmlDoc.getElementsByTagName("quantity")[i].innerHTML = value;
      }
    }
    console.log(xmlDoc);
  }; 
        }
  xhttp.send("Products/products.xml");
  }


function removeXML(name) {
    var x;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "Products/products.xml" , true);
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        xmlDoc = this.responseXML;
        x = xmlDoc.getElementsByTagName("name");
        for (var i=0; i<x.length;i++) {
          if (x[i].innerHTML == name)
            x = xmlDoc.getElementsByTagName("name")[i];
      }
      console.log(x)
    x.parentNode.remove(x);
    console.log(xmlDoc);
  }; 
}
  xhttp.send("Products/products.xml");
  }
  
//   function myFunction(xml, nme) {
      
//       xmlDoc = xml.responseXML;
//       x = xmlDoc.getElementsByTagName("name");
//       for (var i=0; i<x.length;i++) {
//         if (x[i].innerHTML == nme)
//           x = xmlDoc.getElementsByTagName("name")[i]   
//       }
//     console.log(x)
//     x.parentNode.remove(x);
// }

document.addEventListener("beforeunload", function(removed, changed) {
    for (var i = 0; i < removed.length; i++)
        localStorage.removeItem(removed[i]);
    for (var i = 0; i < changed.length; i++)
        console.log(changed[i]);
})