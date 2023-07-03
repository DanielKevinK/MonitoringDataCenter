@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('supervisor.index')}}">Back</a></button>
            <span class="text">Edit Shift</span>
        </div>


        <div class="container">
            <h2>Shift Data Form</h2>
            <form action="{{route('supervisor.update', $data['id'])}}" method='post'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Supervisor Name:</label>
                    <input type="text" id="name" name="name" value="{{isset($data['name'])?$data['name']:old('name')}}" required>
                </div> 
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <select name="report_monitoring_id">
                    <option selected value={{isset($data['report_monitoring_id'])?$data['report_monitoring_id']:old('report_monitoring_id')}}>{{$old->reportMonitoring->product->name}}</option>
                        @foreach ($product as $datas)
                            <option value={{$datas['id']}}>{{$datas->product->name}}</option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Feedback:</label>
                    <input type="text" id="name" name="feedback" value="{{isset($data['feedback'])?$data['feedback']:old('feedback')}}" required>
                </div> 
            
                <button type="submit" class="submit">Submit</button>
            </form>
    </div>

</div>
@endsection
