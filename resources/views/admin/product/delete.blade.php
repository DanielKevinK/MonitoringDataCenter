@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        @if (session()->has('success'))
            <div class="notification">
                <i class="notification-icon">✓</i>
                {{session('success')}}
            </div>
        @endif
        <div class="title">
            <span class="text">Delete Product</span>
            <button class="back"><a href="{{route('info.index')}}">Back</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Product-Name</span>
                    <span class="data-list">{{$data['name']}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Brand</span>
                    <span class="data-list">{{$data['brand']}}</span>
            </div>
            <div class="data email">
                <span class="data-title">RAM</span>
                    <span class="data-list">{{$data['ram']}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Processor</span>
                    <span class="data-list">{{$data['processor']}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Status</span>
                    <span class="data-list">{{$data['status']}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Installation-date</span>
                    <span class="data-list">{{$data['installation_date']}}</span>
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                <form action="{{url('info/'.$data['id'])}}" method="post" onsubmit="return confirm('Are you sure want to delete the data?')">
                    @csrf
                    @method('delete')
                    <button class="btn-delete" type="submit">Delete</button>
                </form>
                
            </div>
        </div>
    </div>
</div>    
@endsection
