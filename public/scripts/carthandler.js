
var target = document.querySelectorAll('#cart-buy')
target.forEach(element => {
    element.addEventListener('click', buy)
});
var button = document.querySelectorAll('#cart-add');
button.forEach(element =>
    {
        element.addEventListener('click', additem)
    });

function buy() {
    var xml = new XMLHttpRequest();
    xml.open('post', 'http://localhost/webalizer/data/create/cart', false)

    xml.setRequestHeader('Accept', 'application/json')
    xml.send(localStorage.getItem('cart'))
    console.log(xml.responseText)

}

function additem(event){
    console.log(event.srcElement.value)
    if(localStorage.getItem('cart') == null){
        localStorage.setItem('cart', '"items": []');
    }
    try {
        cart = JSON.parse(localStorage.getItem('cart'), null);
        
    } catch (error) {
        cart = [];        
    }
    cart.push(event.srcElement.value);
    localStorage.setItem('cart', JSON.stringify(cart))
}