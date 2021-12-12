<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class MovieSearch extends Controller
{
    //
    public function search(Request $request) {

        $search = $request->search;

        $client_id = "8e9cec3f7b168cfd83d542b5847fdbf7";
        $language = "ko-KR";
        // $client_secret = "_VY24Y_K0j"; // naver search

        $encText = urlencode($search);

        /*요청 변수(query, display, start, sort... 네이버 참고)
          json ver: https://openapi.naver.com/v1/search/book.json?...
          xml ver : https://openapi,naver.com/v1/search/book.xml?...
        */

        $url = "https://api.themoviedb.org/3/search/movie?api_key=".$client_id."&language=".$language."&query=".$encText;
        
        $is_post = false;

        /*
          curl = 원하는 url에 값을 넣고 리턴되는 값을 받아오는 함수
        */

        $ch = curl_init();


        /*curl_setopt : curl옵션 세팅
          CURLOPT_URL : 접속할 url
          CURLOPT_POST : 전송 메소드 Post
          CURLOPT_RETURNTRANSFER : 리턴 값을 받음
        */
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, $is_post);  //naver-search
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ("Accept: application/json"));

        // $headers = array();
        // $headers[] = "X-Naver-Client-Id: ".$client_id;
        // $headers[] = "X-Naver-Client-Secret: ".$client_secret;

        /*
          CURLOPT_HTTPHEADER : 헤더 지정 (네이버 api를 사용하려면 필요하다)
          CURLOPT_SSL_VERIFYPEER : 인증서 검사x
          https 접속시 필요
        */
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /*
          curl_exec : 실행
          curl_getinfo : 전송에 대한 정보
          CURLINFO_HTTP_CODE : 마지막 HTTP 코드 수신
        */

        $response = curl_exec ($ch);
        // $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // echo "status_code:".$status_code."";

        // curl_close ($ch);
        // if($status_code == 200) {
        //   // echo $response;
        // } else {
        //   // echo "Error 내용:".$response;
        // }
        
        // json 파싱
        $result = json_decode($response, true);
        // dd($result);
        //print_r($response);
        return $result;
    }
    public function idSearch($id) {
        
        $idSearch = (int)$id;
        $client_id = "8e9cec3f7b168cfd83d542b5847fdbf7";
        $language = "ko-KR";
        

        $url = "https://api.themoviedb.org/3/movie/".$idSearch."?api_key=".$client_id."&language=".$language;
        
        $is_post = false;

        /*
          curl = 원하는 url에 값을 넣고 리턴되는 값을 받아오는 함수
        */

        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ("Accept: application/json"));

        $response = curl_exec ($ch);

        $result = json_decode($response);
        return view('components.movies.show-movie', ['result' => $result]);
    }
    public function popular() {
        
      $client_id = "8e9cec3f7b168cfd83d542b5847fdbf7";
      $language = "ko-KR";

      $url = "https://api.themoviedb.org/3/movie/popular"."?api_key=".$client_id."&language=".$language;
    

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);
      
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array ("Accept: application/json"));


      $response = curl_exec ($ch);
      $result = json_decode($response);

      return $result;
  }
  public function recommend($id) {
        
    $client_id = "8e9cec3f7b168cfd83d542b5847fdbf7";
    $language = "ko-KR";

    $url = "https://api.themoviedb.org/3/movie/".$id.'/recommendations'."?api_key=".$client_id."&language=".$language;
  

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array ("Accept: application/json"));


    $response = curl_exec ($ch);
    $result = json_decode($response);

    return $result;
}
}
