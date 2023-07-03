@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('data.index')}}">Back</a></button>
            <span class="text">Edit User</span>
        </div>


        <div class="container">
            <h2>User Data Form</h2>
            <form action="{{route('data.update', $data['id'])}}" method='post'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{isset($data['name'])?$data['name']:old('name')}}" required>
                </div>
            
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{isset($data['email'])?$data['email']:old('email')}}" required>
                </div>

                <div class="form-group">
                    <label for="email">Address:</label>
                    <input type="text" id="address" name="address" value="{{isset($data['address'])?$data['address']:old('address')}}" required>
                </div>

                <div class="form-group">
                    <label for="email">Phone-Number:</label>
                    <input type="text" id="phone" name="phone" value="{{isset($data['phone'])?$data['phone']:old('phone')}}" required>
                </div>
            
                <button type="submit" class="submit">Submit</button>
            </form>
    </div>

</div>
@endsection
