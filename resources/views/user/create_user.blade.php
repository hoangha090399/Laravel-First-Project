@extends('layouts.app1')

@section('content')
<style>
    :root {
    }
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    }

    #form_wrapper {
        width: 1000px;
        height: 700px;
        /* this will help us center it*/
        margin: auto;
        
        border-radius: 50px;
        /* make it a grid container*/
        display: grid;
        /* with two columns of same width*/
        grid-template-columns: 1fr 1fr;
        /* with a small gap in between them*/
        grid-gap: 5vw;
        /* add some padding around */
        padding: 5vh 15px;
    }
    #form_left {
        /* center the image */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #form_left img {
        width: 350px;
        height: 350px;
    }
    #form_right {
        display: grid;
        /* single column layout */
        grid-template-columns: 1fr;
        /* have some gap in between elements*/
        grid-gap: 20px;
        padding: 10% 5%;
    }
    h1,
    span {
    text-align: center;
    }

    /* make it responsive */
    @media screen and (max-width: 768px) {
        /* make the layout  a single column and add some margin to the wrapper */
        #form_wrapper {
            grid-template-columns: 1fr;
            margin-left: 10px;
            margin-right: 10px;
        }
        /* on small screen we don't display the image */
        #form_left {
            display: none;
        }
    }
</style>
<body>
<div id="form_wrapper">
    <div id="form_left">
        <img src={{ asset('assets/img/brand/user.png') }} alt="computer icon" />
    </div>
    <div id="form_right">
    <x-package-alert type="danger"  message=". Nhớ Thêm Đầy Đủ Ô nha!!!"/>
    <h1>USER CREATE FORM</h1>
        <form class="user" action="/users " method="POST">
        @csrf
        
        <div class="form-group" >
            Name: <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            Email: <input type="text" name="email" class="form-control form-control-user" id="email" placeholder="Email@...com">
        </div>
        <div class="form-group">
            Password: <input type="text" name="password" class="form-control form-control-user" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            Permission: <select name="role_id" class="form-control form-control-user" id="role_id">
            <option value="1">Admin</option>
            <option value="2">Editor</option>
            <option value="3">Viewer</option>
            </select>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Create">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        </form>
        </div>
    </div>
</body>

@endsection