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
            <span class="text">Delete Staff</span>
            <button class="back"><a href="{{route('data.index')}}">Back</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Staff-Name</span>
                    <span class="data-list">{{$data['name']}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Email</span>
                    <span class="data-list">{{$data['email']}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Phone-Number</span>
                    <span class="data-list">{{$data['phone']}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Address</span>
                    <span class="data-list">{{$data['address']}}</span>
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                <form action="{{url('data/'.$data['id'])}}" method="post" onsubmit="return confirm('Are you sure want to delete the data?')">
                    @csrf
                    @method('delete')
                    <button class="btn-delete" type="submit">Delete</button>
                </form>
                
            </div>
        </div>
    </div>
</div>    
@endsection
