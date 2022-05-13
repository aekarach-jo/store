var btn = document.querySelector('#btn-register')
btn.addEventListener('click', function () {
    let permission = "";
    let check = document.querySelectorAll('.check');
    for (let index = 0; index < check.length; index++) {
        if (check[index].checked == true) {
            if (permission.length == 0) {
                permission = check[index].value
            } else {
                permission = permission + ',' + check[index].value
            }
        } else {
            console.log("false", check[index].value);
        }

    }
    console.log(permission);
    let data = {
        'name': document.querySelector('#name'),
        'email': document.querySelector('#email'),
        'password': document.querySelector('#password'),
        // 'permission': document.querySelector('#permission')
        'permission': permission
    }
    let param = {
        'name': data.name.value,
        'email': data.email.value,
        'password': data.password.value,
        'permission': data.permission
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
        if (res.ok) {
            location.href = '/login'
        }
    })
})


