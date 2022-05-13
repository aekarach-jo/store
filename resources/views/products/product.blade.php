@extends('layouts.layouts')
@section('title', 'Product')

@section('style')
    <link rel="stylesheet" href="/css/product.css">
@endsection
@section('content')

    <div class="container container-min-w-h hidden-scroll">
        <div class="row">
            <div class="col">
                <a href="/store">
                <button type="button" class="btn btn-dark">กลับ</button></a>
            </div>
            <div class="col">
                <h1 class="text-center">{{ $Store->storeName }}</h1>
            </div>
            <div class="col">
                <button class="btn btn-dark float-right btn_cerate"  data-bs-toggle="modal"
                    data-bs-target="#modal-add-product"  data-id="{{ $Store->id }}">เพิ่มสินค้า</button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ชื่อสินค้า</th>
                    <th>ประเภท</th>
                    <th class="text-center" width="150">รูปภาพ</th>
                    <th class="text-center" width="150">จำนวน</th>
                    <th class="text-center" width="100">จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Product as $product)
                <tr>
                    <td class="vertical-table">{{ $product->product_name }}</td>
                    <td class="vertical-table">{{ $product->category }}</td>
                    <td class="vertical-table">
                        <img class="rounded-circle image-style img-thumbnail"  src="{{ $product->image }}" >
                    </td>
                    <td class="vertical-table text-center">{{ $product->unit }}</td>
                    <td class="vertical-table">
                        <div class="row">
                            <div class="col-6">
                                <div type="button" class="btn_edit" data-bs-toggle="modal" id="{{ $product->id }}"
                                    data-bs-target="#modal-edit">
                                    <img onclick="onEditProduct(this)"
                                        src="https://img.icons8.com/material-sharp/40/edit--v1.png">
                                </div>
                            </div>
                            <div class="col-6">
                                <div type="button" class="btn_delete" id="{{ $product->id }}">
                                    <img onclick="onDeleteProduct(this)" 
                                        src="https://img.icons8.com/external-anggara-flat-anggara-putra/40/external-delete-interface-anggara-flat-anggara-putra-2.png">
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- add Product -->

    <div class="modal fade" id="modal-add-product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalAddStore" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เพิ่มร้านค้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col p-3">
                            <div class="row">
                                <label for="product_name">ชื่อสินค้า</label>
                                <input type="text" class="form-control" id="product_name">
                            </div>
                            <div class="row">
                                <label for="category">ประเภท</label>
                                <select class="form-control" id="category">
                                    <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                                    <option value="อาหาร">อาหาร</option>
                                    <option value="ขนม">ขนม</option>
                                    <option value="นม">นม</option>
                                </select>
                            </div>
                            <div class="row">
                                <label for="unit">จำนวน</label>
                                <input type="number" class="form-control" id="unit">
                            </div>
                            <div class="row">
                                <label for="image">รูป</label>
                                <input type="file" class="form-control" id="image">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btn-add-product">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Product -->

    <div class="modal fade modal-edit" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalAddStore" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขสินค้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="col p-3">
                            <div class="row" hidden>
                                <label for="id">id</label>
                                <input type="text" class="form-control" id="id">
                            </div>
                            <div class="row">
                                <label for="product_name">ชื่อสินค้า</label>
                                <input type="text" class="form-control" id="product_name">
                            </div>
                            <div class="row">
                                <label for="category">ประเภท</label>
                                <select class="form-control" id="category">
                                    <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                                    <option value="อาหาร">อาหาร</option>
                                    <option value="ขนม">ขนม</option>
                                    <option value="นม">นม</option>
                                </select>
                            </div>
                            <div class="row">
                                <label for="unit">จำนวน</label>
                                <input type="number" class="form-control" id="unit">
                            </div>
                            <div class="row" hidden>
                                <label for="unit">ร้านค้า</label>
                                <input type="number" class="form-control" id="store_id">
                            </div>
                            <div class="row">
                                <label for="image">รูป</label>
                                <input onchange="onChangeImage(this)" type="file" class="form-control" id="image">
                                <img class="preview" src="">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btn-edit-product"
                    onClick="onUpdateProduct()">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="/js/product.js"></script>
@endsection
