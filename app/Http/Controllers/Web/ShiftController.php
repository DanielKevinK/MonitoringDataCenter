<?php

namespace App\Http\Controllers\Web;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
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
        $url = "http://127.0.0.1:8001/api/shift";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('admin.shift.index', ['data' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = $request->shift_start;
        $name = $request->shift_name;
        $end = $request->shift_end;

        $parameters = [
            'shift_start' => $start,
            'shift_name' => $name,
            'shift_end' => $end,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift";
        $response = $client->request('POST', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('shift/shiftInfo')->with('success','Data have been successfully inputed');
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
        $url = "http://127.0.0.1:8001/api/shift/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
             $error = $contentArray['message'];
             return redirect()->to('admin.shift.index')->with('error', 'Data not found');
        }
        else{
            $data = $contentArray['data'];
            return view('admin.shift.delete', ['data'=> $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
             $error = $contentArray['message'];
             return redirect()->to('admin.shift.index')->with('error', 'Data not found');
        }
        else{
            $data = $contentArray['data'];
            return view('admin.shift.show', ['data'=> $data]);
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
        $start = $request->shift_start;
        $name = $request->shift_name;
        $end = $request->shift_end;

        $parameters = [
            'shift_start' => $start,
            'shift_name' => $name,
            'shift_end' => $end,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/shift/$id";
        $response = $client->request('PUT', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('shift/shiftInfo')->with('success','Data have been updated');
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
        $url = "http://127.0.0.1:8001/api/shift/$id";
        $response = $client->request('delete', $url); 
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] == true) {
            return redirect()->to('shift/shiftInfo')->with('success','Data have been deleted');
        }
    }
}
 