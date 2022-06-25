
window.onbeforeunload = function (){
 var quantityInput= document.querySelector(".product-quantity-input");
 var priceInput= document.querySelector(".product-price");

 var key1= document.location;
 var value1 = quantityInput.value;

  
 localStorage.setItem(key1, value1);
 
}


window.onload= function(){
 var quantityInput= document.querySelector(".product-quantity-input");

 if (quantityInput){
    quantityInput.value = localStorage.getItem(document.location);
   
 }
  
 updateTotal();
 
 
}
