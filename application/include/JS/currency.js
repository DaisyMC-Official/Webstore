const button = document.getElementById("currency-button");
const menu = document.getElementById("currency-menu");

/* Define currency symbols */
const currencySymbols = {
    USD: "$",
    GBP: "£",
    EUR: "€",
    AUD: "",
    CAD: "",
    BRL: "R$",
    DKK: "",
    NOK: "",
    NZD: "",
    PLN: "",
    SEK: ""
};

/* Load saved currency on page load */
const savedCurrency = localStorage.getItem("currency");
if (savedCurrency) {
    const symbol = currencySymbols[savedCurrency] || "";
    button.textContent = `${symbol} ${savedCurrency}`;
}

/* Toggle currency menu */
button.addEventListener("click", () => {
    menu.classList.toggle("active");
});

/* Update prices when a currency is selected */
document.querySelectorAll(".currency-grid button").forEach(currency => {
    currency.addEventListener("click", () => {
        const code = currency.textContent;
        const symbol = currencySymbols[code] || "";

        button.textContent = `${symbol} ${code}`;
        localStorage.setItem("currency", code);

        updatePrices(code);

        menu.classList.remove("active");
    });
});

/* Close currency menu if clicking outside */
document.addEventListener("click", (e) => {
    if (!button.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.remove("active");
    }
});

/* Select all rank price elements */
const prices = document.querySelectorAll(".rank-price");

/* Update all prices based on selected currency */
function updatePrices(currency) {
    prices.forEach(price => {
        // Grab the exact price from the data attribute for this currency
        const value = price.dataset[currency.toLowerCase()];
        if (!value) return;

        const symbol = currencySymbols[currency] || "";
        price.textContent = `${symbol}${value} ${currency}`;
    });
}

/* Initialize on page load */
const initCurrency = () => {
    const saved = localStorage.getItem("currency") || "USD";
    updatePrices(saved);
};

initCurrency();