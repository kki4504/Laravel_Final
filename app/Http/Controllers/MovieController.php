<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $client_id = "iJ_DolTYtcgzOWYJJYc4";
        // $client_secret = "_VY24Y_K0j";

        // $url = "https://openapi.naver.com/v1/search/movie.json";

        return view('components.movies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idSearch = (int)$id;
        $client_id = "8e9cec3f7b168cfd83d542b5847fdbf7";
        $language = "ko-KR";


        $url = "https://api.themoviedb.org/3/movie/".$idSearch."?api_key=".$client_id."&language=".$language;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ("Accept: application/json"));

        $response = curl_exec ($ch);

        $result = json_decode($response);
        // dd($result);
        return view('components.movies.create', ['result' => $result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $result = json_decode($request->query);
        // dd($request->result);
        $this->validate($request, ['content'=>'required|min:3']);
        // dd($request);
        $result =  $request -> result;
        
        // dd($result['title']);

        // $input = array_merge($request->all(), ["user_id" => Auth::user()->id]);
        // $input = array_merge($input, ["title" => $result['title']]);
        // $input = array_merge($input, ["image" => $result['poster_path'] ]);
        
        // dd($input);
        Movie::create([
            'content' => $request -> content,
            'title' => $result['title'],
            'image' => $result['poster_path'],
            'user_id' => auth()->user()->id
        ]);
        
        return redirect()->route('movies.myComment',['id' => auth()-> user()->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $movie = $request;
        return view('components.movies.show-movie', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        return view('components.movies.edit', ['result' => Movie::find($id)]);

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
        $this->validate($request, ['content'=>'required|min:3']);

        $movie = Movie::find($id);
        // $post -> title = $request   -> input['title'];
        $movie -> content = $request -> content;
        
        $movie -> save();
            
        return redirect()->route('movies.myComment', ['id'=>auth()->user()->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $movie = Movie::find($id);

        // 게시글에 딸린 이미지가 있으면 파일시스템에서도 삭제해줘야 한다.
        
        $movie -> delete();

        return redirect()->route('movies.index');
    }

    public function myIndex() {
        $user_id = auth()->user()->id;
        $results = Movie::where('user_id', $user_id)->latest()->get();
        // dd($results);

        return view('components.movies.my-index', ['results' => $results]);
    }
}
