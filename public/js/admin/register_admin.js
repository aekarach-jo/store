var btn_register = document.querySelector('#btn-register')
btn_register.addEventListener('click', function () {
    let permission = "";
    let check = document.querySelectorAll('.check')
    for (let i = 0; i < check.length; i++) {
        if(check[i].checked == true){
            if( permission.length == 0){
                permission = check[i].value
            } else {
                permission  = permission+ ','+ check[i].value
            }
        } 
    }
    console.log(permission)


    let data = {
        // 'id' : document.querySelector('#id').value,
        'name': document.querySelector('#name').value,
        'password': document.querySelector('#password').value,
        'email': document.querySelector('#email').value,
        'permission': permission
    }

    console.log(data);

    const url = "/createAdmin"
    fetch(url , {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
        }
    }).then(res => {
        if( res.ok){
            location.href = '/login-admin'
        }
    })
})