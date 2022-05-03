var btn = document.querySelector('#btn-register')
btn.addEventListener('click', function () {
    let data = {
        'name': document.querySelector('#name'),
        'email': document.querySelector('#email'),
        'password': document.querySelector('#password')
    }
    let param = {
        'name': data.name.value,
        'email': data.email.value,
        'password': data.password.value
    }
    console.log(param)

    const url = '/createAccount';
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(param),
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
        }
    }).then(res => {
        if(res.ok){
            location.href = '/login'
        }
    })
})


