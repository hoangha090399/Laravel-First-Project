@extends('layouts.app1')

@section('content')
<style>
	.info {
	background-color: LightGray;
	width: 1200px;
	border: 1px solid gray;
	padding: 30px;
	margin: 20px;
    border-style: outset;
    border-width: 7px;
    border-color: gray;  
	}
</style>
<!-- <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>         -->
<div class="card-body">
    <div class="flex-container">
        
        <div class="col-xs-6">
            <h2 style="margin-top: 0px">HA MART <b>.Inc</b></h2>
            <p>I'm Tony Ha <br>
                Le Van Sy Street, HCM<br>
                Viet Nam
            </p>
        </div>
        <div class="col-xs-6">
            <h2><u>INVOICE ORDER</u></h2>
        </div>
        
    </div>
    <div class="info">
            
        <div class="col-xs-6">
            <strong>ARTICLE ID: {{$article->id ?? ''}}</strong></br>
            <strong>BUYER: {{$articles->user->name}}</strong>
            
            <p>
                <h2>Title: {{ $article->title ?? ''}}</h2>
            </p>
        </div>
        <div class="col-xs-6">
            <p class="h4">#Body: {{ $article->body ?? ''}}</p>
            <h5>Order Date: {{ $article->created_at ?? ''}}</h5>
            
        </div>
            
    </div>
    <div class="line"></div>
        <table class="table">
            <thead>
            <tr>
                <th width="60">*</th>
                <th>PRODUCT NAME</th>
                <th width="120">PRICE</th>
            </tr>
            </thead>
            <tbody>
            
                @foreach($articles->tags as $tag)
                <tr>
                    <td>-</td>
                    <td>{{ $tag->tag ?? ''}}</td>
                    <td>$ {{ $tag->price ?? ''}}</td>
                </tr>
                @endforeach
                
                <tr>
                    <td colspan="2" class="text-right no-border"><strong>Quantity:</strong></td>
                    <td><strong>{{ $articles->tags->count('price') ?? ''}}</strong></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-right no-border"><strong>Total</strong></td>
                    <td><strong>$ {{ $articles->tags->sum('price') ?? ''}}</strong></td>
                </tr>
            
            </tbody>
        </table>
        <div class="row">
            <div class="col-xs-8">
                <p><i> Buy goods at HA MART</i></p>

                <p>Manager By: _______MR. Ha___________ </p>
            </div>
        </div>
        <div align="right"><a href="{{ url()->previous() }}" class="btn btn-primary">Back</a></div>
</div>

@endsection