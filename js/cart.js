let carts = document.querySelectorAll('.add-cart');

let products = [
  {
    name: 'Combiflam - Strip of 20 Tablets',
    tag: 'combiflame',
    price: 34.00,
    inCart: 0
  },
  {
    name: 'Azee-500 - Strip of 5 Tablets',
    tag: 'azee',
    price: 101.05,
    inCart: 0
  },
  {
    name: 'Pantosec - Strip of 10 Tablets',
    tag: 'pantosec',
    price: 100.85,
    inCart: 0
  },
  {
    name: 'Aldactone 100mg - Strip of 15 Tablets',
    tag: 'aldactone',
    price: 163.13,
    inCart: 0
  },
  {
    name: 'Ascoril Expectorant',
    tag: 'ascoril',
    price: 155.13,
    inCart: 0
  },
  {
    name: 'Xylocain 2% Jelly 30gm',
    tag: 'xylocaine',
    price: 28.85,
    inCart: 0
  },
  {
    name: 'Okacet L - Strip of 10 Tablets',
    tag: 'okacet',
    price: 48.45,
    inCart: 0
  },
  {
    name: 'Crocin Advance 500mg - Strip of 15 Tablets',
    tag: 'crocin',
    price: 12.99,
    inCart: 0
  },
];

for (let i=0; i < carts.length; i++) {
  carts[i].addEventListener('click', () => {
    cartNumbers(products[i]);
    totalCost(products[i]);
  });
}

function onLoadCartNumbers() {
  let productNumbers = localStorage.getItem('cartNumbers');

  if (productNumbers) {
    document.querySelector('.cart span').textContent = productNumbers;
  }
}

function cartNumbers(product) {
  let productNumbers = localStorage.getItem('cartNumbers');

  productNumbers = parseInt(productNumbers);

  if (productNumbers) {
    localStorage.setItem('cartNumbers', productNumbers + 1);
    document.querySelector('.cart span').textContent = productNumbers + 1;
  } else {
    localStorage.setItem('cartNumbers', 1);
    document.querySelector('.cart span').textContent = 1;
  }
  setItems(product);
}

function setItems(product) {
  console.log("My product is", product);
  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);

  if (cartItems != null) {

    if (cartItems[product.tag] == undefined) {
      cartItems = {
        ...cartItems,
        [product.tag]: product
      }
    }
    cartItems[product.tag].inCart += 1;
  }else {
    product.inCart = 1;
    cartItems = {
      [product.tag]: product
    }
  }
  localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product) {
  let cartCost = localStorage.getItem("totalCost");

  if (cartCost != null) {
    cartCost = parseFloat(cartCost);
    localStorage.setItem('totalCost', cartCost + product.price);
  } else {
    localStorage.setItem('totalCost', product.price);
  }
}

function displayCart() {
  let cartItems = localStorage.getItem('productsInCart');
  cartItems = JSON.parse(cartItems);
  let productContainer = document.querySelector('.product-section');

  console.log(cartItems);
  if (cartItems && productContainer) {
    productContainer.innerHTML = ' ';
    Object.values(cartItems).map(item => {
      productContainer.innerHTML += `
      <div class="row">
        <div class="product-title col-lg-4">
          <i class="fas fa-times-circle" style="color:#00ad7c; margin-right:5px;"></i>
          <img class="dpro1" src="./images/${item.tag}.jpg">
          <span class="dpro">${item.name}</span>
        </div>
        <div class="price col-lg-2">₹${item.price}</div>
        <div class="quantity col-lg-2">
          <i class="fas fa-arrow-circle-left" style="color:#00ad7c; margin-right:5px;"></i>
          <span>${item.inCart}</span>
          <i class="fas fa-arrow-circle-right" style="color:#00ad7c; margin-left:5px;"></i>
        </div>
        <div class="total col-lg-2">₹${item.inCart * item.price}</div>
      </div>
      `;
    });
    let cartCost = localStorage.getItem("totalCost");
    productContainer.innerHTML += `
      <div class="basketTotalContainer">
        <h4 class="basketTotalTitle">
          Basket Total
        </h4>
        <h4 class="basketTotal">₹${cartCost}</h4>
      </div>

    `;
  }
}

onLoadCartNumbers();
displayCart();
