function post() {
    var data = new FormData(target);
    const res = new XMLHttpRequest();
    console.log(data);
    res.open('POST', adress, false);
    res.send(data);
}
target =document.querySelector('#form')
console.log(target)
for (let i = 0; i < 5; i++) {
    target.innerHTML += '<input type="radio" name = "vote" value ="'+(i+1)+'">'
}
target.innerHTML += '<input type ="text">'
target.innerHTML += '<input type = "submit">'
