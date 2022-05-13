@extends('layouts/layout_login')
@section('title' , "Register Admin")
@section('style')
    <link rel="stylesheet" href="/css/register.css">
@endsection

@section('content')
<div class="form form-style d-block mx-auto shadow-lg shadow-indigo-500/50 space-y-2">
    <h1 class="text-center p-3">Register Admin</h1>
    <div class="col">

        <div class="row">
            <label for="name" class="label-style">name</label>
            <input type="text" id="name" class="input-style">
        </div>
        <div class="row">
            <label for="email" class="label-style">email</label>
            <input type="text" id="email" class="input-style">
        </div>
        <div class="row">
            <label for="password" class="label-style">password</label>
            <input type="password" id="password" class="input-style">
        </div>
        <div class="row">
            <div class="check-permission text-center" id="permission">
                <input type="checkbox" id="user" name="user" value="01" class="check">
                <label for="user"> Super Admin </label>
                <input type="checkbox" id="admin" name="admin" value="02" class="check">
                <label for="admin"> admin </label>
                <input type="checkbox" id="guest" name="guest" value="03" class="check">
                <label for="guest"> sub admin </label>
                {{-- <button class="btn btn-success" id="onSubmit" type="submit">Submit</button> --}}
            </div>
            {{-- <select class=" input-style" id="permission">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                <option value="guest">Guest</option>
            </select> --}}
        </div>
        <button class="btn btn-success mt-3 d-block mx-auto"  type="submit" id="btn-register">Register</button>
    </div>
</div>
@endsection

@section('script')
 <script src="/js/admin/register_admin.js"></script>
 @endsection