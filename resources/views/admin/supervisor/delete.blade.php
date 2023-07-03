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
            <span class="text">Delete Supervisor</span>
            <button class="back"><a href="{{route('supervisor.index')}}">Back</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Supervisor-Name</span>
                    <span class="data-list">{{$data['name']}}</span>
            </div>
            <div class="data names">
                <span class="data-title">Product Name</span>
                    <span class="data-list">{{$display->reportMonitoring->product->name}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Server-Status</span>
                    <span class="data-list">{{$display->reportMonitoring->server_status}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Crash-Status</span>
                    <span class="data-list">{{$display->reportMonitoring->crash_status}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Monitoring-Date</span>
                    <span class="data-list">{{$display->reportMonitoring->monitoring_date}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Feedback</span>
                    <span class="data-list">{{$data['feedback']}}</span>
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                <form action="{{url('supervisor/'.$data['id'])}}" method="post" onsubmit="return confirm('Are you sure want to delete the data?')">
                    @csrf
                    @method('delete')
                    <button class="btn-delete" type="submit">Delete</button>
                </form>
                
            </div>
        </div>
    </div>
</div>    
@endsection
