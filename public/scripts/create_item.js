function run(event){
    let data = new FormData(event)
    
    post(path, data)
}
function post(adress, raw_data) {
    console.log('posting data to server', raw_data);
    res = new XMLHttpRequest();
    res.open('POST', adress, true);
    return res.send(raw_data);
}