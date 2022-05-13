var product = []
fetchProduct()
async function fetchProduct() {
    const data = await axios.get('/productAllData')
    product = data.data.data
}

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

var btn_addProduct = document.querySelector('#btn-add-product')
btn_addProduct.addEventListener('click', function () {
    let data = {
        'product_name': document.querySelector('#product_name'),
        'category': document.querySelector('#category'),
        'unit': document.querySelector('#unit'),
        'image': document.querySelector('#image'),
        'store_id': document.querySelector('.btn_cerate').getAttribute('data-id')
    }
    let param = {
        'product_name': data.product_name.value,
        'category': data.category.value,
        'unit': data.unit.value,
        'image': data.image.files,
        'store_id': data.store_id
    }
    console.log(param)
    let formData = new FormData()
    formData.append('product_name', param.product_name)
    formData.append('category', param.category)
    formData.append('unit', param.unit)
    if (param.image.length > 0) {
        formData.append('image[]', param.image[0])
    }
    formData.append('store_id', param.store_id)


    const url = '/createProduct'
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            // "Content-Type": "application/json",
            // "Accept": "application/json",
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


async function onEditProduct(d) {
    let btn = d.closest('.btn_edit')
    let id = btn.getAttribute('id')
    if (product.length < 1) {
        await fetchProduct();
    }
    var data = product.find(e => e.id == id)
    console.log(data.image);
    var modal = document.querySelector('#modal-edit')
    modal.querySelector('#id').value = data.id
    modal.querySelector('#product_name').value = data.product_name
    modal.querySelector('#category').value = data.category
    modal.querySelector('#unit').value = data.unit
    modal.querySelector('.preview').src = data.image
}


function onUpdateProduct() {
    var modal = document.querySelector('#modal-edit')
    let productData = {
        'id': modal.querySelector('#id').value,
        'product_name': modal.querySelector('#product_name').value,
        'category': modal.querySelector('#category').value,
        'unit': modal.querySelector('#unit').value,
        'image': modal.querySelector('#image').files,
        
    }
    console.log(productData.image);

    let formData = new FormData()
    formData.append('id', productData.id)
    formData.append('product_name', productData.product_name)
    formData.append('category', productData.category)
    formData.append('unit', productData.unit)
    if(productData.image.length > 0){
        formData.append('image[]', productData.image[0])
    }
    formData.append('store_id', productData.store_id)
    console.log(formData);
    const url = '/updateProduct'
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
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

async function onDeleteProduct(d) {
    let btn = d.closest('.btn_delete')
    let id = btn.getAttribute('id')
    if (product.lenght < 1) {
        await fetchProduct();
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

            const url = `/deleteProduct/${id}`
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

function onChangeImage(e) {
    let file = e.files;
    if(file.length > 0){
        // document.querySelector('#modal-edit .modal-body #image').innerHTML = `
        // <input onchange="onChangeImage(this)" type="file" class="form-control" id="image">
        // <img class="preview" src="">
        // `;
        let input = document.querySelector('#modal-edit .modal-body #image')
        input.files = e.files

        let preview = document.querySelector('#modal-edit .modal-body .preview')
        preview.src = URL.createObjectURL(file[0])
        console.log(preview.src);
    }
}