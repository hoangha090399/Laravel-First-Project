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
        <img src={{ asset('assets/img/brand/profile.png') }} alt="computer icon" />
    </div>
    <div id="form_right">
    <x-package-alert type="danger"  message=". Nhớ Thêm Đầy Đủ Ô nha!!!"/>
    <h1>PROFILE CREATE FORM</h1>
        <form class="profile" action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group" >
            Full Name:<input type="text" name="full_name" class="form-control form-control-user" id="full_name" placeholder="Full Name">
        </div>
        <div class="form-group">
            Address: <input type="text" name="address" class="form-control form-control-user" id="address" placeholder="Address">
        </div>
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                Birthday: <input type="date" class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday">
            </div>
        </div>

        <div class="form-group">
            <div class="custom-file">
                Avatar: <input type="file" class="custom-file-input " id="avatar" name="avatar" >
                <label for="avatar" class="custom-file-label">{{$profile->avatar ?? ""}}</label>
            </div>
        </div>

        <!-- lấy thông tin thông báo đã thêm vào session để hiển thị -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                <li>{{ $message }}  </li>
            @if ($message = Session::get('file'))
                <li>{{ $message }}  </li> 
            @endif

            </div>
        @endif
        
        <!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
        @if (count($errors) > 0)
            <div class="alert alert-danger"> <!-- tự chuyển sang sử dụng alert component đã tạo các tuần trước -->
                <li>{{ $message }}  </li>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="hidden" class="form-control form-control-user" name="user_id" id="user_id" value="{{$id}}">

        <input type="submit" class="btn btn-primary" value="Create">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        </form>
        </div>
    </div>
</body>
@endsection

@section('js')
    <script>
        $('#avatar').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection('js')