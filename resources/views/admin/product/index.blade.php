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
            <span class="text">Data Product</span>
            <button class="add"><a href="{{route('info.create')}}">Add New</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Product-Name</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['name']}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Brand</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['brand']}}</span>
                @endforeach
            </div>
            <div class="data joined">
                <span class="data-title">RAM</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['ram']}}</span>
                @endforeach
            </div>
            <div class="data type">
                <span class="data-title">Processor</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['processor']}}</span>
                @endforeach
            </div>
            <div class="data type">
                <span class="data-title">Status</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['status']}}</span>
                @endforeach
            </div>
            <div class="data type">
                <span class="data-title">installation-date</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['installation_date']}}</span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $item)
                    <span class="data-list"><a href="{{url('info/'.$item['id'])}}" class="edit">Edit</a></span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $item)
                    <span class="data-list"><a href="{{url('info/delete/'.$item['id'])}}" class="delete">Delete</a></span>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection
