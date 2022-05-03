@extends('layouts.layouts')
@section('title', "Product")

@section('style')
<link rel="stylesheet" href="/css/product.css">
@endsection
@section('content')

<div class="container container-min-w-h">
    <div class="row">
        <div class="col">
            <h1>{{$Store->storeName}}</h1>
        </div>
        <div class="col">
            <button class="btn btn-dark float-right" class="btn_get_product_id" >เพิ่มสินค้า</button>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ชื่อ</th>
                <th>ที่อยู่</th>
                <th width="150">เบอร์โทร.</th>
                <th width="100">สินค้า</th>
                <th width="100">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div type="button">
                        <div type="button" class="btn_get_product_id">
                            <img src="https://img.icons8.com/external-yogi-aprelliyanto-basic-outline-yogi-aprelliyanto/40/external-product-marketing-and-seo-yogi-aprelliyanto-basic-outline-yogi-aprelliyanto.png">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-6">
                            <div type="button" class="btn_edit" data-bs-toggle="modal" data-bs-target="#modal-edit">
                                <img src="https://img.icons8.com/material-sharp/40/edit--v1.png">
                            </div>
                        </div>
                        <div class="col-6">
                            <div type="button" class="btn_delete">
                                <img src="https://img.icons8.com/external-anggara-flat-anggara-putra/40/external-delete-interface-anggara-flat-anggara-putra-2.png">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection
@section('script')
<script src="/js/product.js"></script>
@endsection