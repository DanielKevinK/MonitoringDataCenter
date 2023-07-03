<?php

namespace App\Http\Controllers\Web;

use App\Models\Shift;
use GuzzleHttp\Client;
use App\Models\DataStaff;
use App\Models\ShiftStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ReportMonitoring;

class ReportMonitoringController extends Controller
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
        $url = "http://127.0.0.1:8001/api/report-monitoring";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        $display = ReportMonitoring::all();
        return view('admin.reportMonitoring.index', ['display' => $display], ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = ShiftStaff::all();
        $product = Product::all();
        return view('admin.reportMonitoring.create', ['staff' => $staff], ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift_staff_id = $request->shift_staff_id;
        $product_id = $request->product_id;
        $server_status = $request->server_status;
        $crash_status = $request->crash_status;
        $monitoring_date = $request->monitoring_date;

        $parameters = [
            'shift_staff_id' => $shift_staff_id,
            'product_id' => $product_id,
            'server_status' => $server_status,
            'crash_status' => $crash_status,
            'monitoring_date' => $monitoring_date,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/report-monitoring";
        $response = $client->request('POST', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('reportMonitoring/monitoring')->with('success','Data have been successfully inputed');
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
        $url = "http://127.0.0.1:8001/api/report-monitoring/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        $display = ReportMonitoring::findOrFail($id);
        return view('admin.reportMonitoring.delete', ['display' => $display], ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $old = ReportMonitoring::findOrFail($id);
        $staff = ShiftStaff::all();
        $product = Product::all();
        $client = new Client();
        $url = "http://127.0.0.1:8001/api/report-monitoring/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
             $error = $contentArray['message'];
             return redirect()->to('admin.reportMonitoring.index')->with('error', 'Data not found');
        }
        else{
            $data = $contentArray['data']; 
            return view('admin.reportMonitoring.show',  compact('data','staff','product', 'old'));
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
        $shift_staff_id = $request->shift_staff_id;
        $product_id = $request->product_id;
        $server_status = $request->server_status;
        $crash_status = $request->crash_status;
        $monitoring_date = $request->monitoring_date;

        $parameters = [
            'shift_staff_id' => $shift_staff_id,
            'product_id' => $product_id,
            'server_status' => $server_status,
            'crash_status' => $crash_status,
            'monitoring_date' => $monitoring_date,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/report-monitoring/$id";
        $response = $client->request('PUT', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('reportMonitoring/monitoring')->with('success','Data have been updated');
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
        $url = "http://127.0.0.1:8001/api/report-monitoring/$id";
        $response = $client->request('delete', $url); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('reportMonitoring/monitoring')->with('success','Data have been deleted');
        }
    }
}
