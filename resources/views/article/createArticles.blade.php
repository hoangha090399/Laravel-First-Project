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
        <h1>ARTICLE CREATE FORM</h1>
            <form class="user" action="/articles " method="POST">
            @csrf
            
            <div class="form-group" >
                Title: <input type="text" name="title" class="form-control form-control-user" id="title" placeholder="Title...">
            </div>
            <div class="form-group">
                User ID:<input type="number" name="user_id" class="form-control form-control-user" id="user_id" placeholder="User Id...">
            </div>
            <div class="form-group">
                <input type="text" name="body" class="form-control form-control-user" id="body" placeholder="Body">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" name="created_at" id="created_at" placeholder="Create at day">
                </div>
            </div>
            <!-- <div class="form-group">
                <input type="number" name="article_id" class="form-control form-control-user" id="article_id" placeholder="Article Id...">
            </div>
            <div class="form-group">
                <input type="number" name="tag_id" class="form-control form-control-user" id="tag_id" placeholder="Tag Id...">
            </div> -->
            
            <input type="submit" class="btn btn-primary" value="Create">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </form>
            </div>
    </div>
</body>
@endsection