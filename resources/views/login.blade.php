@extends('layouts.layout_login')
@section('title', "Login")
@section('style')
<link rel="stylesheet" href="/css/login.css">
@endsection

@section('content')
<div class="form form-style d-block mx-auto shadow-lg shadow-indigo-500/50 space-y-2">
    <h1 class="text-center p-3">Login</h1>
    <div class="col">
        <div class="row">
            <label for="email" class=" label-style ">email</label>
            <input type="email" id="email" class=" input-style ">
        </div>
        <div class="row">
            <label for="password" class=" label-style ">password</label>
            <input type="password" id="password" class=" input-style">
        </div>
    </div>
    <button class="btn btn-success mt-4 d-block mx-auto " id="btn-login">Login</button>
</div>
</div>
@endsection

@section('script')
<script src="/js/login.js"></script>
@endsection