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
            <span class="text">Data Report Maintenance</span>
            <button class="add"><a href="{{route('maintenance.create')}}">Add New</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Staff Name</span>
                @foreach ($display as $item)
                    <span class="data-list">{{$item->shiftStaff->dataStaff->name}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Product Name</span>
                @foreach ($display as $item)
                    <span class="data-list">{{$item->product->name}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Repair Status</span>
                @foreach ($data as $datas)
                    <span class="data-list">{{$datas['repair_status']}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Server Status</span>
                @foreach ($data as $datas)
                    <span class="data-list">{{$datas['server_status']}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Maintenance Date</span>
                @foreach ($data as $datas)
                    <span class="data-list">{{$datas['maintenance_date']}}</span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $datas)
                    <span class="data-list"><a href="{{url('maintenance/'.$datas['id'])}}" class="edit">Edit</a></span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $datas)
                    <span class="data-list"><a href="{{url('maintenance/delete/'.$datas['id'])}}" class="delete">Delete</a></span>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection
