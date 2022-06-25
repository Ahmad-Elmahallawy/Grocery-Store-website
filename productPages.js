if (document.readyState == 'loading') {
  document.addEventListener('DOMContentLoaded', ready)
} else {
  ready()
}


function ready() {
  var quantityInputs = document.getElementsByClassName('product-quantity')
  for (var i = 0; i < quantityInputs.length; i++) {
  var input = quantityInputs[i]
  input.addEventListener('change', quantityChanged)
  }
}

// Corrects input quantity
function quantityChanged(event) {
  var input = event.target
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1
  }
  updateTotal()
}

// Price for the product
var priceElement = document.getElementsByClassName('product-price')[0]
var price = parseFloat(priceElement.innerText.replace('$', ''))

function updateTotal() {
  var total = 0
  var quantityElement = document.getElementsByClassName('product-quantity-input')[0]
  var quantity = quantityElement.value
  
  if (quantity === 0) {
    total = price
  } else {
    total = price * quantity
  }
  total = Math.round(total * 100) / 100
  document.getElementsByClassName('product-price')[0].innerText ='$' + total
}