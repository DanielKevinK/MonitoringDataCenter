@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('status.index')}}">Back</a></button>
            <span class="text">Edit Shift Staff</span>
        </div>


        <div class="container">
            <h2>Shift Staff Data Form</h2>
            <form action="{{route('status.update', $data['id'])}}" method='post'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Staff Name:</label>
                    <select name="staff_id" disabled>
                    <option selected>{{$staff->dataStaff->name}}</option>
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
