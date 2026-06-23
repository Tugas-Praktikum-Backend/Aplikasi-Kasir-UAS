import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const categoryDD = document.getElementById('cashier-products-category');
    const productDD = document.getElementById('cashier-products');

    const data = JSON.parse(productDD.dataset.products);

    categoryDD.addEventListener('change', () => {
            productDD.options.length = 0;

            for (const prod_id in data[categoryDD.value]) {
                const prod = data[categoryDD.value][prod_id];
                productDD.disabled = false;

                let opt = document.createElement('option');
                opt.textContent = prod[0] + ' - ' + prod[1];
                opt.value = prod_id;
                if(prod[1] <= 0)opt.disabled = true;

                productDD.appendChild(opt);
            }
        }
    );

    categoryDD.dispatchEvent(new Event('change'));
})
