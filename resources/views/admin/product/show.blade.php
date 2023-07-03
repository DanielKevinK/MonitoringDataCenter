@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('info.index')}}">Back</a></button>
            <span class="text">Edit Product</span>
        </div>


        <div class="container">
            <h2>Product Data Form</h2>
            <form action="{{route('info.update', $data['id'])}}" method='post'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{isset($data['name'])?$data['name']:old('name')}}" required>
                </div>
            
                <div class="form-group">
                    <label for="brand">Brand:</label>
                    <input type="text" id="email" name="brand" value="{{isset($data['brand'])?$data['brand']:old('brand')}}" required>
                </div>

                <div class="form-group">
                    <label for="ram">RAM:</label>
                    <input type="text" id="address" name="ram" value="{{isset($data['ram'])?$data['ram']:old('ram')}}" required>
                </div>

                <div class="form-group">
                    <label for="processor">Processor:</label>
                    <input type="text" id="phone" name="processor" value="{{isset($data['processor'])?$data['processor']:old('processor')}}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" id="phone" name="status" value="{{isset($data['status'])?$data['status']:old('status')}}" required>
                </div>

                <div class="form-group">
                    <label for="installation_date">Installation-date:</label>
                    <input type="date" id="phone" name="installation_date" value="{{isset($data['installation_date'])?$data['installation_date']:old('installation_date')}}" required>
                </div>
            
                <button type="submit" class="submit">Submit</button>
            </form>
    </div>

</div>
@endsection
