const button = document.getElementById('currency-button');
const menu = document.getElementById('currency-menu');
const prices = document.querySelectorAll('.rank-price');

if (button && menu) {
    const baseCurrency = 'GBP';
    const exchangeRatesFromGbp = {
        GBP: 1,
        USD: 1.27,
        EUR: 1.17,
        AUD: 1.95,
        CAD: 1.76,
        BRL: 7.33,
        DKK: 8.72,
        NOK: 13.65,
        NZD: 2.14,
        PLN: 4.99,
        SEK: 13.36
    };

    const locales = {
        GBP: 'en-GB',
        USD: 'en-US',
        EUR: 'de-DE',
        AUD: 'en-AU',
        CAD: 'en-CA',
        BRL: 'pt-BR',
        DKK: 'da-DK',
        NOK: 'nb-NO',
        NZD: 'en-NZ',
        PLN: 'pl-PL',
        SEK: 'sv-SE'
    };

    function formatCurrency(amount, currencyCode) {
        return new Intl.NumberFormat(locales[currencyCode] || 'en-GB', {
            style: 'currency',
            currency: currencyCode,
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(amount);
    }

    function getPriceValue(element, currencyCode) {
        const directValue = Number(element.dataset[currencyCode.toLowerCase()] || 0);

        if (directValue > 0) {
            return directValue;
        }

        const gbpValue = Number(element.dataset.gbp || 0);

        if (gbpValue <= 0) {
            return 0;
        }

        return gbpValue * (exchangeRatesFromGbp[currencyCode] || 1);
    }

    function updatePrices(currencyCode) {
        prices.forEach((price) => {
            const value = getPriceValue(price, currencyCode);

            if (value <= 0) {
                return;
            }

            price.textContent = formatCurrency(value, currencyCode);
        });
    }

    function updateButton(currencyCode) {
        button.textContent = currencyCode;
    }

    document.querySelectorAll('.currency-grid button').forEach((currency) => {
        currency.addEventListener('click', () => {
            const code = currency.textContent.trim();
            localStorage.setItem('currency', code);
            updateButton(code);
            updatePrices(code);
            menu.classList.remove('active');
        });
    });

    button.addEventListener('click', () => {
        menu.classList.toggle('active');
    });

    document.addEventListener('click', (event) => {
        if (!button.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.remove('active');
        }
    });

    const savedCurrency = localStorage.getItem('currency') || baseCurrency;
    updateButton(savedCurrency);
    updatePrices(savedCurrency);
}
