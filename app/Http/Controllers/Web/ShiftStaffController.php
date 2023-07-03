<?php

namespace App\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataStaff;
use App\Models\Shift;
use App\Models\ShiftStaff;

class ShiftStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift-staff";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        $name = ShiftStaff::all();
        return view('admin.shift-staff.index', ['name' => $name], ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = DataStaff::all();
        $shift = Shift::all();
        return view('admin.shift-staff.create', ['staff' => $staff], ['shift' => $shift]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff_id = $request->staff_id;
        $shift_id = $request->shift_id;

        $parameters = [
            'staff_id' => $staff_id,
            'shift_id' => $shift_id,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift-staff";
        $response = $client->request('POST', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('shiftStaff/status')->with('success','Data have been successfully inputed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift-staff/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        $name = ShiftStaff::findOrFail($id);
        return view('admin.shift-staff.delete', ['name' => $name], ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = ShiftStaff::findOrFail($id);
        $shift = Shift::all();
        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift-staff/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
             $error = $contentArray['message'];
             return redirect()->to('admin.shiftStaff.index')->with('error', 'Data not found');
        }
        else{
            $data = $contentArray['data']; 
            return view('admin.shift-staff.show',  compact('data','staff','shift'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shift_id = $request->shift_id;

        $parameters = [
            'shift_id' => $shift_id,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift-staff/$id";
        $response = $client->request('PUT', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('shiftStaff/status')->with('success','Data have been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift-staff/$id";
        $response = $client->request('delete', $url); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('shiftStaff/status')->with('success','Data have been deleted');
        }
    }
}
