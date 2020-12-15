@extends('layouts.app1')

@section('content')
    <form class="profile" action="{{ route('profiles.update',['profile' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group" >
            <input type="text" name="full_name" class="form-control form-control-user" id="full_name" placeholder="Full Name" value="{{$profile->full_name}}">
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control form-control-user" id="address" placeholder="Address" value="{{$profile->address}}">
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="date" class="form-control form-control-user" name="birthday" id="birthday" placeholder="Birthday" value="{{$profile->birthday}}">
            </div>
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input " id="avatar" name="avatar" >
                <label for="avatar" class="custom-file-label">{{$profile->avatar}}</label>
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
			
        <input type="submit" class="btn btn-primary" value="Update">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    </form>

    
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