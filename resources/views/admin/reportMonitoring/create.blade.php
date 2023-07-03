@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('monitoring.index')}}">Back</a></button>
            <span class="text">Add Report Monitoring</span>
        </div>


        <div class="container">
            <h2>Report Monitoring Data Form</h2>
            <form action="{{route('monitoring.store')}}" method='post'>
                @csrf
                <div class="form-group">
                    <label for="name">Staff:</label>
                    <select name="shift_staff_id">
                    <option selected>Select Staff</option>
                        @foreach ($staff as $name)
                            <option value={{$name['id']}}>{{$name->dataStaff->name}}</option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Product:</label>
                    <select name="product_id">
                    <option selected>Select Product</option>
                        @foreach ($product as $data)
                            <option value={{$data['id']}}>{{$data['name']}}</option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Server Status:</label>
                    <input type="text" id="name" name="server_status" required>
                </div> 
                <div class="form-group">
                    <label for="name">Crash Status:</label>
                    <input type="text" id="name" name="crash_status" required>
                </div>  
                <div class="form-group">
                    <label for="name">Monitoring Date:</label>
                    <input type="date" id="name" name="monitoring_date" required>
                </div>       
                <button type="submit" class="submit">Submit</button>
            </form>
    </div>
</div>
@endsection
