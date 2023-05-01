
        let target = document.querySelector('input');
        target.addEventListener('keyup', run);

        function httpget(url, data) {
			var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
		}

        function run() {
            let val = '';
        val = '/webalizer/search'
        console.log(target.value)
        data = JSON.stringify({
            search: target.value
			});
        //val = '/webalizer/?q='+target.value+'#';
        document.querySelector('.items').innerHTML = httpget(val, data);
		}