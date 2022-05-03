var btn = document.querySelector('#btn-logout')
btn.addEventListener('click', function () {
    const url = '/logout'
    fetch(url, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
        }
    })
})

var btn_addStore = document.querySelector('#btn-add-store')
btn_addStore.addEventListener('click', function () {
    let data = {
        'storeName': document.querySelector('#storeName'),
        'address': document.querySelector('#address'),
        'tel': document.querySelector('#tel'),
    }
    let param = {
        'storeName': data.storeName.value,
        'address': data.address.value,
        'tel': data.tel.value
    }

    console.log(param);
    const url = '/createStore'
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(param),
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
        }
    }).then(res => {
        window.location.reload()
    })
})


var content = [];
fetchContent()
async function fetchContent() {
    const data = await axios.get('/storeContentForEdit')
    content = data.data.data
    console.log(content);

}

var storeData = [];
async function onEditStore(d) {
    let btn = d.closest('.btn_edit')
    let id = btn.getAttribute('id')
    if (content.lenght < 1) {
        await fetchContent();
    }
    var data = content.find(e => e.id == id)
    var modal = document.querySelector('#modal-edit')
    modal.querySelector('#storeName').value = data.storeName
    modal.querySelector('#address').value = data.address
    modal.querySelector('#tel').value = data.tel
    console.log(data);

    storeData = {
        'storeName': data.storeName,
        'address': data.address,
        'tel': data.tel,
    }
}

function onUpdateStore(storeData) {
    const url = '/updateStore'
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(storeData),
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
        }
    })
    // .then(res => {
    //     window.location.reload()
    // })
}