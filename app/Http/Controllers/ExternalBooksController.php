<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Http\Client\Response;

class ExternalBooksController extends Controller
{
    public function show()
    {
    	$response = Http::acceptJson()->get('https://www.anapioficeandfire.com/api/books');

    		if ($response->status() !== 200) {
                return response()->json([
                "status_code"=> 204,
                "status" => "success with error",
                "message" => "Network issues",
                "data" => []
            	]);
            }

       		$books = $response->json();
       		
       		if (empty($books)) {
                return response()->json([
                "status_code"=> 204,
                "status" => "success with error",
                "message" => "No Data found",
                "data" => []
            	]);
            }else{
            	return response()->json([
                "status_code"=> 200,
                "status" => "success",
                "data" => $books
           	   ]);
            }
    }

    public function app()
    {
    	$response = Http::get('https://www.anapioficeandfire.com/api/books');

        if ($response->status() !== 200) {
            return redirect()->back()->with('error_msg',"Kindly check your network");
        }

  		$books = $response->json();

    	return view('app')->with(compact('books'));
    }

    public function EditBook(Request $response)
    {
    	if ($response->isMethod('post')) {
    		 $data=$request->validate([
                'name'=>['nullable', 'string'],
                'isbn'=>'nullable',
                'authors'=>'nullable',
                'number_of_pages'=>'nullable',
                'publisher'=>'nullable',
                'country'=>'nullable',
                'release_date'=>'nullable',
            ]);

    		$updateBook = Http::patch('https://www.anapioficeandfire.com/api/books');

    		$updateBook->update($data);

    		return redirect('/')->with('success_msg', 'The Book was successfully updated');
    	}

    	return view('edit_books');
    	
    }

}
