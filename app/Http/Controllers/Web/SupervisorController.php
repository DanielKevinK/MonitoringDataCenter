<?php

namespace App\Http\Controllers\Web;

use GuzzleHttp\Client;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReportMonitoring;

class SupervisorController extends Controller
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
        $url = "http://127.0.0.1:8001/api/supervisor";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        $display = Supervisor::all();
        return view('admin.supervisor.index', ['display' => $display], ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = ReportMonitoring::all();
        return view('admin.supervisor.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $report_monitoring_id = $request->report_monitoring_id;
        $feedback = $request->feedback;

        $parameters = [
            'name' => $name,
            'report_monitoring_id' => $report_monitoring_id,
            'feedback' => $feedback,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/supervisor";
        $response = $client->request('POST', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('supervisorData/supervisor')->with('success','Data have been successfully inputed');
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
        $url = "http://127.0.0.1:8001/api/supervisor/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        $display = Supervisor::findOrFail($id);
        return view('admin.supervisor.delete', ['display' => $display], ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $old = Supervisor::findOrFail($id);
        $product = ReportMonitoring::all();
        $client = new Client();
        $url = "http://127.0.0.1:8001/api/supervisor/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
             $error = $contentArray['message'];
             return redirect()->to('admin.supervisor.index')->with('error', 'Data not found');
        }
        else{
            $data = $contentArray['data']; 
            return view('admin.supervisor.show',  compact('data','product', 'old'));
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
        $name = $request->name;
        $report_monitoring_id = $request->report_monitoring_id;
        $feedback = $request->feedback;

        $parameters = [
            'name' => $name,
            'report_monitoring_id' => $report_monitoring_id,
            'feedback' => $feedback,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/supervisor/$id";
        $response = $client->request('PUT', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('supervisorData/supervisor')->with('success','Data have been updated');
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
        $url = "http://127.0.0.1:8001/api/supervisor/$id";
        $response = $client->request('delete', $url); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('supervisorData/supervisor')->with('success','Data have been deleted');
        }
    }
}
