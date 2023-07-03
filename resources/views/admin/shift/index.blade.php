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
            <span class="text">Data Shift   </span>
            <button class="add"><a href="{{route('shiftInfo.create')}}">Add New</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Shift-Name</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['shift_name']}}</span>
                @endforeach
            </div>
            <div class="data names">
                <span class="data-title">Shift-Start</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['shift_start']}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Shift-End</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['shift_end']}}</span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $item)
                    <span class="data-list"><a href="{{url('shiftInfo/'.$item['id'])}}" class="edit">Edit</a></span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $item)
                    <span class="data-list"><a href="{{url('shiftInfo/delete/'.$item['id'])}}" class="delete">Delete</a></span>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection
