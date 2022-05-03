@extends('layouts.layout_login')
@section('title', "Register")

@section('style')
    <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
<div class="form form-style d-block mx-auto shadow-lg shadow-indigo-500/50 space-y-2">
    <h1 class="text-center p-3">Register</h1>
    <div class="col">
        <div class="row">
            <label for="name" class="label-style">name</label>
            <input type="text" id="name" class="input-style">
        </div>
        <div class="row">
            <label for="email" class="label-style">email</label>
            <input type="email" id="email" class="input-style">
        </div>
        <div class="row">
            <label for="password" class="label-style">password</label>
            <input type="password" id="password" class="input-style">
        </div>

        <button class="btn btn-success mt-3 d-block mx-auto" id="btn-register">Register</button>
    </div>
</div>
@endsection
@section('script')
<script src="/js/register.js"></script>
@endsection