@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('supervisor.index')}}">Back</a></button>
            <span class="text">Add Data</span>
        </div>


        <div class="container">
            <h2>Supervisor Data Form</h2>
            <form action="{{route('supervisor.store')}}" method='post'>
                @csrf
                <div class="form-group">
                    <label for="name">Supervisor Name:</label>
                    <input type="text" id="name" name="name" required>
                </div> 
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <select name="report_monitoring_id">
                    <option selected>Select Product</option>
                        @foreach ($product as $data)
                            <option value={{$data['id']}}>{{$data->product->name}}</option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Feedback:</label>
                    <input type="text" id="name" name="feedback" required>
                </div> 
                <button type="submit" class="submit">Submit</button>
            </form>
    </div>
</div>
@endsection
