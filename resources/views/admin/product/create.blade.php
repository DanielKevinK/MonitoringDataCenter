@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="activity">
        <div class="title">
            <button class="back"><a href="{{route('info.index')}}">Back</a></button>
            <span class="text">Add Product</span>
        </div>


        <div class="container">
            <h2>Product Data Form</h2>
            <form action="{{route('info.store')}}" method='post'>
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
            
                <div class="form-group">
                    <label for="email">Brand:</label>
                    <input type="text" id="email" name="brand" required>
                </div>

                <div class="form-group">
                    <label for="email">RAM:</label>
                    <input type="text" id="address" name="ram" required>
                </div>

                <div class="form-group">
                    <label for="email">Processor:</label>
                    <input type="text" id="phone" name="processor" required>
                </div>
            
                <div class="form-group">
                    <label for="email">Status:</label>
                    <input type="text" id="phone" name="status" required>
                </div>

                <div class="form-group">
                    <label for="email">Installation-date:</label>
                    <input type="date" id="phone" name="installation_date" required>
                </div>

                <button type="submit" class="submit">Submit</button>
            </form>
    </div>
</div>
@endsection
