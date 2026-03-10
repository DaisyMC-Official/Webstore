document.addEventListener("DOMContentLoaded", function(){

const cart = JSON.parse(localStorage.getItem("daisymc_cart")) || [];

// Function to render cart
function renderCart() {
    const list = document.getElementById("cart-items-list");
    const totalEl = document.getElementById("cart-total");

    if(!list || !totalEl) return; // prevents errors on pages without cart

    list.innerHTML = "";

    let total = 0;

    cart.forEach((item, index) => {
        const li = document.createElement("li");

        li.innerHTML = `
            <span class="cart-item-name">${item.name}</span>
            <span class="cart-item-price">$${item.price.toFixed(2)}</span>
            <button class="remove-item-btn" data-index="${index}">✕</button>
        `;

        list.appendChild(li);

        total += item.price;
    });

    totalEl.textContent = total.toFixed(2);

    document.querySelectorAll(".remove-item-btn").forEach(btn => {
        btn.addEventListener("click", (e) => {
            const idx = e.target.dataset.index;
            cart.splice(idx, 1);
            localStorage.setItem("daisymc_cart", JSON.stringify(cart));
            renderCart();
        });
    });

    document.getElementById("basket-items").textContent = cart.length + " items";
}

// Add item to cart
function addItemToCart(name, price) {
    cart.push({ name, price });
    localStorage.setItem("daisymc_cart", JSON.stringify(cart));
    renderCart();
}

// Checkout
const checkoutBtn = document.getElementById("checkout-btn");

if(checkoutBtn){
    checkoutBtn.addEventListener("click", () => {

        if(cart.length === 0){
            alert("Your cart is empty!");
            return;
        }

        const total = cart.reduce((a,b)=>a+b.price,0).toFixed(2);

        alert(`Checking out ${cart.length} items, total $${total}`);

        cart.length = 0;
        localStorage.setItem("daisymc_cart", JSON.stringify(cart));
        renderCart();
    });
}

// Add to cart buttons
document.querySelectorAll(".add-to-cart-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {

        const name = e.target.dataset.name;
        const price = parseFloat(e.target.dataset.price);

        addItemToCart(name, price);
    });
});

// Initial render
renderCart();

});