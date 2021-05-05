<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        $client = new \GuzzleHttp\Client();
        $param = $req->query();

        if (isset($param['page']) != null) {
            $request = $client->get('https://jobs.github.com/positions.json?page='.$param['page'].'');
            $response = json_decode($request->getBody());
        } else {
            if (isset($param['description']) != null || isset($param['location']) != null || isset($param['fulltime']) != false) {
                if (isset($param['fulltime']) == false) {
                    $param['fulltime'] = "";
                }
                $urlRequest =  'https://jobs.github.com/positions.json?description='.$param['description'].'&location='.$param['location'].'&full_time='.$param['fulltime'].'';
                $request = $client->get($urlRequest);
                $response = json_decode($request->getBody());
            } else {
                $request = $client->get('https://jobs.github.com/positions.json');
                $response = json_decode($request->getBody());
            }
        }

        // dd($response);
        return view('home', compact('response'));
    }

    public function detail($id)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://jobs.github.com/positions/'.$id.'.json');
        $response = json_decode($request->getBody());
        // dd($response);

        return view('detail', compact('response'));
    }
}
