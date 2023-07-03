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
            <span class="text">Data Staff</span>
            <button class="add"><a href="{{route('data.create')}}">Add New</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Staff-Name</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['name']}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Email</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['email']}}</span>
                @endforeach
            </div>
            <div class="data joined">
                <span class="data-title">Phone-Number</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['phone']}}</span>
                @endforeach
            </div>
            <div class="data type">
                <span class="data-title">Address</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['address']}}</span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $item)
                    <span class="data-list"><a href="{{url('data/'.$item['id'])}}" class="edit">Edit</a></span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $item)
                    <span class="data-list"><a href="{{url('data/delete/'.$item['id'])}}" class="delete">Delete</a></span>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection
