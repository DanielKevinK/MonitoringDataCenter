@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('maintenance.index')}}">Back</a></button>
            <span class="text">Edit Report Maintenance</span>
        </div>


        <div class="container">
            <h2>Shift Staff Data Form</h2>
            <form action="{{route('maintenance.update', $data['id'])}}" method='post'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Staff:</label>
                    <select name="shift_staff_id">
                    <option selected value={{isset($data['shift_staff_id'])?$data['shift_staff_id']:old('shift_staff_id')}}>{{$old->shiftStaff->dataStaff->name}}</option>
                        @foreach ($staff as $name)
                        <option value={{$name['id']}}>{{$name->dataStaff->name}}</option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Product:</label>
                    <select name="product_id">
                    <option selected value={{isset($data['product_id'])?$data['product_id']:old('product_id')}}>{{$old->product->name}}</option>
                        @foreach ($product as $datas)
                            <option value={{$datas['id']}}>{{$datas['name']}}</option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Repair Status:</label>
                    <input type="text" id="name" name="repair_status" value="{{isset($data['repair_status'])?$data['repair_status']:old('repair_status')}}" required>
                </div> 
                <div class="form-group">
                    <label for="name">Server Status:</label>
                    <input type="text" id="name" name="server_status" value="{{isset($data['server_status'])?$data['server_status']:old('server_status')}}" required>
                </div>  
                <div class="form-group">
                    <label for="name">Maintenance Date:</label>
                    <input type="date" id="name" name="maintenance_date" value="{{isset($data['maintenance_date'])?$data['maintenance_date']:old('maintenance_date')}}" required>
                </div>
                <button type="submit" class="submit">Submit</button>
            </form>
    </div>

</div>
@endsection
