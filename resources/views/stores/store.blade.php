@extends('layouts.layouts')
@section('title', "Store")

@section('style')
<link rel="stylesheet" href="/css/store.css">
@endsection

@section('content')

<div class="container container-min-w-h">
    <div class="row">
        <div class="col">
            <h1>Store Online</h1>
        </div>
        <div class="col">
            <button class="btn btn-dark float-right" data-bs-toggle="modal" data-bs-target="#modal-add-store">เพิ่มร้านค้า</button>
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
            @foreach ($viewContent as $content)
            <tr>
                <td>{{$content->storeName}}</td>
                <td>{{$content->address}}</td>
                <td>{{$content->tel}}</td>
                <td>
                    <div type="button">
                        <img src="https://img.icons8.com/external-yogi-aprelliyanto-basic-outline-yogi-aprelliyanto/40/external-product-marketing-and-seo-yogi-aprelliyanto-basic-outline-yogi-aprelliyanto.png" >
                    </dic>
                </td>
                <td>
                    <div class="row">
                        <div class="col-6">
                            <div type="button" class="btn_edit" id="{{$content->id}}" data-bs-toggle="modal" data-bs-target="#modal-edit">
                                <img onclick="onEditStore(this)" src="https://img.icons8.com/material-sharp/40/edit--v1.png">
                            </div>
                        </div>
                        <div class="col-6">
                            <div type="button" class="btn_delete" id="{{$content->id}}">
                                <img onclick="onDeleteStore(this)" src="https://img.icons8.com/external-anggara-flat-anggara-putra/40/external-delete-interface-anggara-flat-anggara-putra-2.png">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Store -->

<div class="modal fade" id="modal-add-store" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddStore" aria-hidden="true">
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
                            <label for="">ชื่อร้านค้า</label>
                            <input type="text" class="form-control" id="storeName">
                        </div>
                        <div class="row">
                            <label for="">ที่อยู่</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <div class="row">
                            <label for="">เบอร์โทร</label>
                            <input type="text" class="form-control" id="tel">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                <button class="btn btn-success" data-bs-dismiss="modal" id="btn-add-store">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Store -->

<div class="modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
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
                            <label for="storeName">ชื่อร้านค้า</label>
                            <input type="text" class="form-control" id="storeName">
                        </div>
                        <div class="row">
                            <label for="address">ที่อยู่</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <div class="row">
                            <label for="tel">เบอร์โทร</label>
                            <input type="text" class="form-control" id="tel">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                <button class="btn btn-success" data-bs-dismiss="modal" id="btn-store" onclick="onUpdateStore()">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="/js/store.js"></script>
@endsection