<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $req){

        $validation =$req->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        $admin=Admin::where([
            ['name','=',$req->name],
            ['password','=',$req->password],
        ])->first();
  
        if(!$admin){
            $validation =$req->validate([
            'user'=>'required',
            
            
        ],['user.required'=>'User dose not exist']);
        }
        Session::put('admin',$admin);
        return redirect('dashboard');
    }
    public function dashboard(){
        $admin=  Session::get('admin');
            
        if($admin){
        return view("admin",["name"=>$admin->name]);

        }else{
            return redirect('admin-login');
        }
    }
    public function categories(){
        $categories= Category::get();
        $admin=  Session::get('admin');
            
        if($admin){
        return view("categories",["name"=>$admin->name,"categories"=>$categories]);

        }else{
            return redirect('admin-login');
        }
     }
    function logout(){
        Session::forget("admin");
            return redirect('admin-login');

    }
    function addCategory(Request $req){

        $validation =$req->validate([
                'category'=>'required | min:3 | unique:categories,name',
                
            ]);
        $admin=  Session::get('admin');

        $category = new Category();
        $category->name = $req->category;
        $category->creator = $admin->name;
    if(  $category->save()){
    Session::flash('category',"Success : Category ".$req->name." Added. "); 
    }
            return redirect('admin-categories');


    }
    function deleteCategory($id){
        $isDelete=Category::find($id)->delete();
        if( $isDelete){
    Session::flash('category',"Success : Category deleted. "); 
    }
            return redirect('admin-categories');

    }
    function  addQuiz(){

         $categories= Category::get();
        $admin=  Session::get('admin');
            
        if($admin){
            $quiz_Name=request("quiz");
            $category_id=request("category");
      
            if($category_id && $quiz_Name && !Session::has('quizDetails')){
                $quiz = new Quiz();
                $quiz->name=$quiz_Name;
                $quiz->category_id=$category_id;
                if($quiz->save()){
                    Session::put('quizDetails',$quiz);
                }

            }
        return view("add-quiz",["name"=>$admin->name,"categories"=>$categories]);

        }else{
            return redirect('admin-login');
        }
       
    }
}