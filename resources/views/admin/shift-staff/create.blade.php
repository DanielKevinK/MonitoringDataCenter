@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('status.index')}}">Back</a></button>
            <span class="text">Add Shift Staff</span>
        </div>


        <div class="container">
            <h2>Shift Staff Data Form</h2>
            <form action="{{route('status.store')}}" method='post'>
                @csrf
                <div class="form-group">
                    <label for="name">Staff Name:</label>
                    <select name="staff_id">
                    <option selected>Select Staff</option>
                        @foreach ($staff as $item)
                            <option value={{$item['id']}}>{{$item['name']}}</option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Shift Time:</label>
                    <select name="shift_id">
                    <option selected>Select Shift</option>
                        @foreach ($shift as $time)
                            <option value={{$time['id']}}>{{$time['shift_name']}} ({{$time['shift_start']}} - {{$time['shift_end']}})</option>
                        @endforeach                       
                    </select>
                </div>          
                <button type="submit" class="submit">Submit</button>
            </form>
    </div>
</div>
@endsection
