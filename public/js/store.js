var btn = document.querySelector('#btn-logout')
btn.addEventListener('click', function () {
    Swal.fire({
        position: 'center',
        text: "ยืนยันการออกจากระบบหรือไม่?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#2aad19',
        confirmButtonText: 'ยืนยัน'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = '/logout'
            fetch(url, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
                }
            })
        }
        window.location.reload();
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
        if (res.ok) {
            Swal.fire({
                position: "center",
                icon: 'success',
                title: "สำเร็จ",
                showConfirmButton: false,
                timer: 700,
            }).then((ress) => {
                window.location.reload();
            })
        }
    })
})


var content = [];
fetchStore()
async function fetchStore() {
    const data = await axios.get('/storeAllData')
    content = data.data.data
    console.log(content);
}

async function onEditStore(d) {
    let btn = d.closest('.btn_edit')
    let id = btn.getAttribute('id')
    if (content.lenght < 1) {
        await fetchStore();
    }
    var data = content.find(e => e.id == id)
    console.log(data);
    var modal = document.querySelector('#modal-edit')
    modal.querySelector('#id').value = data.id
    modal.querySelector('#storeName').value = data.storeName
    modal.querySelector('#address').value = data.address
    modal.querySelector('#tel').value = data.tel
    console.log(data);

}

var storeData = [];
function onUpdateStore(storeData) {
    var modal = document.querySelector('#modal-edit')
    storeData = {
        'id': modal.querySelector('#id').value,
        'storeName': modal.querySelector('#storeName').value,
        'address': modal.querySelector('#address').value,
        'tel': modal.querySelector('#tel').value
    }
    console.log(storeData);
    const url = '/updateStore'
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(storeData),
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
        }
    }).then(res => {
        if (res.ok) {
            Swal.fire({
                position: "center",
                icon: 'success',
                title: "แก้ไขแล้ว",
                showConfirmButton: false,
                timer: 700,
            }).then((ress) => {
                window.location.reload();
            })
        }
    })

}

async function onDeleteStore(d) {
    let btn = d.closest('.btn_delete')
    let id = btn.getAttribute('id')
    if (content.lenght < 1) {
        await fetchStore();
    }

    Swal.fire({
        position: 'center',
        text: "ยืนยันการลบหรือไม่?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#2aad19',
        confirmButtonText: 'ยืนยัน'
    }).then((result) => {
        if (result.isConfirmed) {

            const url = `/deleteStore/${id}`
            fetch(url, {
                method: 'GET',
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
                }
            }).then(res => {
                if (res.ok) {
                    Swal.fire({
                        position: "center",
                        icon: 'success',
                        title: "ลบแล้ว",
                        showConfirmButton: false,
                        timer: 700,
                    }).then((ress) => {
                        window.location.reload();
                    })
                }
            })
        }
    })
}

// async function getStoreId(d){
//     let btn = d.closest('.btn_get_product_id')
//     let id = btn.getAttribute('id')
//     dd = {
//         'id' : id
//     }
//     if(content.lenght < 1){
//         await fetchStore();
//     }
//     const url = `/getStoreById/${id}`
//     console.log(url);
//     fetch(url, {
//         method: 'GET',
//         headers: {
//             "Content-Type": "application/json",
//             "Accept": "application/json",
//             "X-CSRF-Token": document.querySelector('[name="csrf-token"]').content
//         }
//     })
// }



//////////////////////////////// sweetAlet 2 Area /////////////////////////// 
