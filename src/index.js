//Behavior

  var products = {
  milk: {
    aisle: 1,
    onSale: true,
  },
  eggs: {
    aisle: 1,
    onSale: true,
  },
  cheese: {
    aisle: 1,
    onSale: false,
  },
  lettuce: {
    aisle: 2,
    onSale: true,
  },
  tomatoes: {
    aisle: 2,
    onSale: false,
  },
  onions: {
    aisle: 2,
    onSale: true,
  },
  shampoo: {
    aisle: 3,
    onSale: false,
  }, 
  soap: {
    aisle: 3,
    onSale: true,
  },
  toothpaste: {
    aisle: 3,
    onSale: false,
  }
};

function start(){
  
document.getElementById('good').innerHTML = '';
document.getElementById('error').innerHTML = '';
  
let someProd = document.getElementById('input').value.toLowerCase();
  
if (someProd in products) {
document.getElementById('good').innerHTML =("Your item " + '(' + someProd + ')' + " is in aisle " + products[someProd].aisle + ".");
  if (products[someProd].onSale === true) {
  document.getElementById('good').innerHTML +="<span id = 'good'> Good news, it's on sale!</span>";
      
    } else {
  document.getElementById('good').innerHTML +="<span id = 'good'> Sadly, it's not on sale.</span>"; 
 } 
} else{
    document.getElementById('error').innerHTML +="<span id = 'error'> Oops, we don't carry that item. Please choose an item from the word bank</span>";
  }   
}
 












  
  
  
  







  
  
  
  























