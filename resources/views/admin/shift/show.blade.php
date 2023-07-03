@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('shiftInfo.index')}}">Back</a></button>
            <span class="text">Edit Shift</span>
        </div>


        <div class="container">
            <h2>Shift Data Form</h2>
            <form action="{{route('shiftInfo.update', $data['id'])}}" method='post'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Shift-Name:</label>
                    <input type="text" id="name" name="shift_name" value="{{isset($data['shift_name'])?$data['shift_name']:old('shift_name')}}" required>
                </div>
                <div class="form-group">
                    <label for="name">Shift-Start:</label>
                    <input type="time" id="name" name="shift_start" value="{{isset($data['shift_start'])?$data['shift_start']:old('shift_start')}}" required>
                </div>
            
                <div class="form-group">
                    <label for="email">Shift-End:</label>
                    <input type="time" id="email" name="shift_end" value="{{isset($data['shift_end'])?$data['shift_end']:old('shift_end')}}" required>
                </div>
            
                <button type="submit" class="submit">Submit</button>
            </form>
    </div>

</div>
@endsection
