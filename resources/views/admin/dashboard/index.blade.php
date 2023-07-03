@extends('admin.home')

@section('content')
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <span class="text">Dashboard</span>
        </div>

        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-folder-open"></i>
                <span class="text">Total Report</span>
                <span class="number">5</span>
            </div>
            <div class="box box2">
                <i class="uil uil-user"></i>
                <span class="text">Total Staff</span>
                <span class="number">7</span>
            </div>
            <div class="box box3">
                <i class="uil uil-database"></i>
                <span class="text">Total Product</span>
                <span class="number">15</span>
            </div>
        </div>
    </div>

    <div class="activity">
        <div class="title">
            <span class="text">Recent Activity</span>
        </div>

        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Staff-Name</span>
                <span class="data-list">Daniel</span>
                <span class="data-list">Lantar Zulkarnain</span>
                <span class="data-list">Michael</span>
                <span class="data-list">Sinta Sanjaya</span>
                <span class="data-list">Syahrini Julia</span>
            </div>
            <div class="data email">
                <span class="data-title">Email</span>
                <span class="data-list">daniel.kurniawan001@binus.ac.id</span>
                <span class="data-list">Lantar@gmail.com</span>
                <span class="data-list">michael.kusuma@binus.ac.id</span>
                <span class="data-list">sinta@gmail.com</span>
                <span class="data-list">syahrini@gmail,com</span>
            </div>
            <div class="data joined">
                <span class="data-title">Shift</span>
                <span class="data-list">Shift 3</span>
                <span class="data-list">Shift 2</span>
                <span class="data-list">Shift 2</span>
                <span class="data-list">Shift 3</span>
                <span class="data-list">Shift 3</span>
            </div>
            <div class="data type">
                <span class="data-title">Server Monitored</span>
                <span class="data-list">Server Dell</span>
                <span class="data-list">Server Lenovo</span>
                <span class="data-list">Server Dell</span>
                <span class="data-list">Server IBM</span>
                <span class="data-list">Server Lenovo X</span>
            </div>
            <div class="data status">
                <span class="data-title">Server Status</span>
                <span class="data-list">Maintenanced</span>
                <span class="data-list">Working</span>
                <span class="data-list">Working</span>
                <span class="data-list">Broken</span>
                <span class="data-list">Maintenanced</span>
            </div>
        </div>
    </div>
</div>    
@endsection
