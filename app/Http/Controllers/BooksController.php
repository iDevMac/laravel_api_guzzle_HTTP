<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input();
            $book = new Book;

            $bookval=validator($request->all(),[
                'name'=>['required', 'string'],
                'isbn'=>'required',
                'authors'=>'required',
                'number_of_pages'=>'required',
                'publisher'=>'required',
                'country'=>'required',
                'release_date'=>'required',
            ]);

            if($bookval->fails()){
                return response()->json([
                    "status_code"=> 500,
                    "status" => "error",
                    'message' => $bookval->errors()
                 ]);
                }

            $book->name = $data['name'];
            $book->isbn = $data['isbn'];
            $book->authors = $data['authors'];
            $book->number_of_pages = $data['number_of_pages'];
            $book->publisher = $data['publisher'];
            $book->country = $data['country'];
            $book->release_date = $data['release_date'];
            $book->save();

            return response()->json([
                "status_code"=> 201,
                "status" => "success",
                "data" => $book
            ]);
        }

    }

    public function read(){
        $books = Book::get();

        if(count($books)){
            return response()->json([
                "status_code"=> 200,
                "status" => "success",
                "data" => $books
            ]);
        }else{
             return response()->json([
                "status_code"=> 200,
                "status" => "success",
                "data" => []
            ]);
        }

    }

    public function update(Request $request, $id)
    {
            //Get data from feild and validate
         $data=$request->validate([
                'name'=>['nullable', 'string'],
                'isbn'=>'nullable',
                'authors'=>'nullable',
                'number_of_pages'=>'nullable',
                'publisher'=>'nullable',
                'country'=>'nullable',
                'release_date'=>'nullable',
            ]);

        $updateBook = Book::find($id);

            //conditional statement to check if specified id exits
        if ($updateBook) {
            //method to update data  
            $updateBook->update($data);
            //return json reponse on outcome
            return response()->json([
                "status_code"=> 201,
                "status" => "success",
                "message" => "The Book my First Book was updated successfully",
                "data" => $updateBook
            ]);
        }else{
            return response()->json([
                "status_code"=> 404,
                "status" => "unsuccessful",
                "message" => "Unable to locate specified book record",
                "data" => []
            ]);
        }
    }

     public function delete($id)
    {
        $deleteBook = Book::find($id);

        if ($deleteBook) {
            $deleteBook->delete();
            return response()->json([
                "status_code"=> 204,
                "status" => "success",
                "message" => "The Book my First Book was deleted successfully",
                "data" => []
            ]);
        }else{
            return response()->json([
                "status_code"=> 204,
                "status" => "success with error",
                "message" => "This particular Book record does not exist",
                "data" => []
            ]);
        }

    }


    public function show($id)
    {
        $books = Book::where('id',$id)->get();

        if(count($books)){
            return response()->json([
                "status_code"=> 200,
                "status" => "success",
                "data" => $books
            ]);
        }else{
             return response()->json([
                "status_code"=> 200,
                "status" => "success",
                "data" => []
            ]);
        }
    }

    public function searchName($name)
    {
        $search = Book::where("name", "like", "%".$name."%")->get();
            if(count($search)){
                return response()->json([
                    "status_code"=> 200,
                    'succcess' => "success",
                    'message' => 'Search successful!',
                    'data'    => $search,
                ]);
            }
            else {
                return response()->json([
                    "status_code"=> 422,
                    'succcess' => "successful with Exeption",
                    'message' => 'Search Error',
                    'error' => 'We could not find Job related to '."'".$name."'".', Kindly try again.'
                ]);
            }
    }

    public function searchCountry($country)
    {
        $search = Book::where("country", "like", "%".$country."%")->get();
            if(count($search)){
                return response()->json([
                    "status_code"=> 200,
                    'succcess' => "success",
                    'message' => 'Search successful!',
                    'data'    => $search,
                ]);
            }
            else {
                return response()->json([
                    "status_code"=> 422,
                    'succcess' => "successful with Exeption",
                    'message' => 'Search Error',
                    'error' => 'We could not find Job related to '."'".$country."'".', Kindly try again.'
                ]);
            }
    }

    public function searchPublisher($publisher)
    {
        $search = Book::where("publisher", "like", "%".$publisher."%")->get();
            if(count($search)){
                return response()->json([
                    "status_code"=> 200,
                    'succcess' => "success",
                    'message' => 'Search successful!',
                    'data'    => $search,
                ]);
            }
            else {
                return response()->json([
                    "status_code"=> 422,
                    'succcess' => "successful with Exeption",
                    'message' => 'Search Error',
                    'error' => 'We could not find Job related to '."'".$publisher."'".', Kindly try again.'
                ]);
            }
    }

    public function searchYear($year)
    {
        $search = Book::where("release_date", "like", "%".$year."%")->get();
            if(count($search)){
                return response()->json([
                    "status_code"=> 200,
                    'succcess' => "success",
                    'message' => 'Search successful!',
                    'data'    => $search,
                ]);
            }
            else {
                return response()->json([
                    "status_code"=> 422,
                    'succcess' => "successful with Exeption",
                    'message' => 'Search Error',
                    'error' => 'We could not find Job related to '."'".$year."'".', Kindly try again.'
                ]);
            }
    }


}
