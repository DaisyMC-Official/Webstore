document.addEventListener("DOMContentLoaded", function(){

// modal open/close
const basket = document.querySelector(".basket");
const modal = document.getElementById("login-modal");
const closeBtn = document.getElementById("login-close");

// SIDEBAR ELEMENTS
const sidebar = document.getElementById("basket-sidebar");
const overlay = document.getElementById("basket-overlay");
const logoutBtn = document.getElementById("logout-btn");
const sidebarUsername = document.getElementById("sidebar-username");
const sidebarItems = document.getElementById("sidebar-items");

// LOGIN ELEMENTS
const usernameInput = document.getElementById("login-username");
const loginBtn = document.getElementById("login-submit");
const loginHead = document.getElementById("login-head");

const basketName = document.getElementById("basket-name");
const basketItems = document.getElementById("basket-items");
const basketSkin = document.getElementById("basket-skin");

let skinTimer;


// BASKET CLICK
basket.addEventListener("click", () => {

    const savedUser = localStorage.getItem("daisymc_user");

    if(!savedUser){
        modal.classList.add("active");
        return;
    }

    openSidebar(savedUser);

});


// MODAL CLOSE
closeBtn.addEventListener("click", () => {
    modal.classList.remove("active");
});

modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.classList.remove("active");
    }
});


// USERNAME SKIN PREVIEW
usernameInput.addEventListener("input", function(){

    clearTimeout(skinTimer);

    skinTimer = setTimeout(() => {

        let username = usernameInput.value.trim();

        if(username === ""){
            loginHead.src = "https://mc-heads.net/head/Steve";
            return;
        }

        loginHead.src = "https://mc-heads.net/head/" + username;

    },200);

});


// ENTER KEY LOGIN
usernameInput.addEventListener("keypress", function(e){
    if(e.key === "Enter"){
        loginBtn.click();
    }
});


// LOGIN BUTTON
loginBtn.addEventListener("click", function(){

    const username = usernameInput.value.trim();

    if(username === ""){

        const loginBox = document.querySelector(".login-box");

        loginBox.classList.add("shake");

        setTimeout(() => {
            loginBox.classList.remove("shake");
        },350);

        usernameInput.focus();
        return;
    }

    localStorage.setItem("daisymc_user", username);

    updateBasket(username);

    modal.classList.remove("active");

});


// UPDATE BASKET
function updateBasket(username){

    basketName.textContent = username + "'s Basket";

    const cart = JSON.parse(localStorage.getItem("daisymc_cart")) || [];
    basketItems.textContent = cart.length + " items";

    basketSkin.src = "https://mc-heads.net/body/" + username + "/left";

}


// OPEN SIDEBAR
function openSidebar(username){

    sidebar.classList.add("active");
    overlay.classList.add("active");

    sidebarUsername.textContent = username + "'s Basket";

    const cart = JSON.parse(localStorage.getItem("daisymc_cart")) || [];
    sidebarItems.textContent = cart.length + " items in basket";

}


// CLOSE SIDEBAR
overlay.addEventListener("click", () => {

    sidebar.classList.remove("active");
    overlay.classList.remove("active");

});


// LOGOUT BUTTON
logoutBtn.addEventListener("click", () => {

    localStorage.removeItem("daisymc_user");
    localStorage.removeItem("daisymc_cart_count");

    basketName.textContent = "Guest's Basket";
    basketItems.textContent = "click to login";
    basketSkin.src = "https://mc-heads.net/body/Steve2/left";

    sidebar.classList.remove("active");
    overlay.classList.remove("active");

});


// AUTO LOGIN
const savedUser = localStorage.getItem("daisymc_user");

if(savedUser){
    updateBasket(savedUser);
}

});