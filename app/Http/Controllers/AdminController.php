<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Category;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    
    public function login(Request $request){
        if(Admin::isLoggedIn()){
            return redirect('/admin');
        }
        if($request->isMethod('post')){
            $input = $request->input();
            if(strtolower($input['username']) === strtolower('vafadmin') && $input['password'] === 'VafAdmin18874'){
                Session::put('user_id', md5(strtolower($input['username'])));
            }
        }
        return view('admin.login');
    }
    
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            
            // Validating Data
            $this->validate($request, [
                'name' => 'required|unique:categories|max:255',
                'type' => 'required',
            ]);
            
            $Category = new Category();
            $Category->name = $request->name;
            $Category->type = $request->type;
            if($Category->save()){
                Session::flash('note.ok', 'Category Successfully Saved');
            }else{
                Session::flash('note.error', 'Something Goes Wrong');
            }
            return redirect('/admin/addCategory');
            
        }
        return view('admin.addCategory');
    }
    
    public function addPicture(){
        return view('admin.addPicture');
    }
    
    public function lastUpdates(){
        return view('admin.lastUpdates');
    }
    
}