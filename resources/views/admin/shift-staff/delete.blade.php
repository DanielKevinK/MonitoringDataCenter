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
            <span class="text">Delete Shift Staff</span>
            <button class="back"><a href="{{route('status.index')}}">Back</a></button>
        </div>
        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Staff-Name</span>
                {{-- @foreach ($name as $item) --}}
                    <span class="data-list">{{$name->dataStaff->name}}</span>
                {{-- @endforeach --}}
            </div>
            <div class="data email">
                <span class="data-title">Shift-Name</span>
                    <span class="data-list">{{$name->shift->shift_name}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Shift-Start</span>
                    <span class="data-list">{{$name->shift->shift_start}}</span>
            </div>
            <div class="data email">
                <span class="data-title">Shift-End</span>
                    <span class="data-list">{{$name->shift->shift_end}}</span>
            </div>
            <div class="data status">
                <span class="data-title">Action</span>
                <form action="{{url('status/'.$data['id'])}}" method="post" onsubmit="return confirm('Are you sure want to delete the data?')">
                    @csrf
                    @method('delete')
                    <button class="btn-delete" type="submit">Delete</button>
                </form>   
            </div>
        </div>
    </div>
</div>    
@endsection
