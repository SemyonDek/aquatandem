document.getElementById('sale-name-slider-prod').onclick = function () {
    document.getElementsByClassName('active-name-slider')[0].classList.remove('active-name-slider');
    document.getElementById('sale-name-slider-prod').classList.add('active-name-slider');
    document.getElementById('new-block-prod').style.display = 'none';
    document.getElementById('sale-block-prod').style.display = 'block';
}

document.getElementById('new-name-slider-prod').onclick = function () {
    document.getElementsByClassName('active-name-slider')[0].classList.remove('active-name-slider');
    document.getElementById('new-name-slider-prod').classList.add('active-name-slider');
    document.getElementById('new-block-prod').style.display = 'block';
    document.getElementById('sale-block-prod').style.display = 'none';
}

SaleBlockProductsSlider = document.getElementById('sale-block-products-slider');
SaleBlockProdPage = 1;
valueProdSale = document.getElementById('value_sale-block-prod').value - 3;
document.getElementById('button-sale-slider-left').onclick = function () {
    if (SaleBlockProdPage > 1) {
        SaleBlockProdPage -= 1; 
        SaleBlockProductsSlider.style.left = '-' + (SaleBlockProdPage - 1) * 250 + 'px'
    }
}
document.getElementById('button-sale-slider-right').onclick = function () {
    if (SaleBlockProdPage < valueProdSale) {
        SaleBlockProdPage += 1; 
        if (SaleBlockProdPage == valueProdSale) {
            SaleBlockProductsSlider.style.left = '-' + (((SaleBlockProdPage - 2) * 250) + 154)  + 'px'
        } else {
            SaleBlockProductsSlider.style.left = '-' + (SaleBlockProdPage - 1) * 250 + 'px'
            
        }
    }
}

NewBlockProductsSlider = document.getElementById('new-block-products-slider');
NewBlockProdPage = 1;
valueProdNew = document.getElementById('value_new-block-prod').value - 3;
document.getElementById('button-new-slider-left').onclick = function () {
    if (NewBlockProdPage > 1) {
        NewBlockProdPage -= 1; 
        NewBlockProductsSlider.style.left = '-' + (NewBlockProdPage - 1) * 250 + 'px'
    }
}
document.getElementById('button-new-slider-right').onclick = function () {
    if (NewBlockProdPage < valueProdNew) {
        NewBlockProdPage += 1; 
        if (NewBlockProdPage == valueProdNew) {
            NewBlockProductsSlider.style.left = '-' + (((NewBlockProdPage - 2) * 250) + 154)  + 'px'
        } else {
            NewBlockProductsSlider.style.left = '-' + (NewBlockProdPage - 1) * 250 + 'px'
            
        }
    }
}
