function run(event){
    let data = new FormData(event)
    
    res=post(path, data)
    if (res.status >400){
        alert('error ocured try again\n'+res.status+'\n' + res.responseText)
    } else{
        alert('done')
    }
}
function post(adress, raw_data) {
    console.log('posting data to server', raw_data);
    const res = new XMLHttpRequest();
    //res.addEventListener('loadend', ()=>{return res})
    //res.addEventListener('error', ()=>{return 1;})
    res.open('POST', adress, false);
    res.send(raw_data);
    return res;
}