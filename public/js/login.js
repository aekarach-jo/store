var btn = document.querySelector('#btn-login')
btn.addEventListener('click', function() {
    let data = {
        // 'name': document.querySelector('#name'),
        'name': document.querySelector('#name'),
        'password': document.querySelector('#password')
    }
    let param = {

        'name': data.name.value,
        'password': data.password.value
    }
    console.log(param)

    const url = '/userLogin';
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(param),
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data =>{

        console.log(data.message);
        if (data.message == "it's ok") {
           location.href = '/store'
        }
        console.log(data.data);

    })
})