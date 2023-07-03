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
            <span class="text">Data Supervisor</span>
            <button class="add"><a href="{{route('supervisor.create')}}">Add New</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Supervisor Name</span>
                @foreach ($data as $datas)
                    <span class="data-list">{{$datas['name']}}</span>
                @endforeach
            </div>
            <div class="data names">
                <span class="data-title">Product Name</span>
                @foreach ($display as $item)
                    <span class="data-list">{{$item->reportMonitoring->product->name}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Server-Status</span>
                @foreach ($display as $item)
                    <span class="data-list">{{$item->reportMonitoring->server_status}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Crash-Status</span>
                @foreach ($display as $item)
                    <span class="data-list">{{$item->reportMonitoring->crash_status}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Monitoring-Date</span>
                @foreach ($display as $item)
                    <span class="data-list">{{$item->reportMonitoring->monitoring_date}}</span>
                @endforeach
            </div>
            <div class="data email">
                <span class="data-title">Feedback</span>
                @foreach ($data as $item)
                    <span class="data-list">{{$item['feedback']}}</span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $item)
                    <span class="data-list"><a href="{{url('supervisor/'.$item['id'])}}" class="edit">Edit</a></span>
                @endforeach
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                @foreach ($data as $item)
                    <span class="data-list"><a href="{{url('supervisor/delete/'.$item['id'])}}" class="delete">Delete</a></span>
                @endforeach
            </div>
        </div>
    </div>
</div>    
@endsection
