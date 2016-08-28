<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Category as Category;
use App\Picture as Picture;

class AdminController extends Controller
{
    public function index(){
        $pictures = Picture::all();
        foreach($pictures as $_pic){
            $categories[$_pic->category->id] = $_pic->category;
            $pics[$_pic->category->id][] =  $_pic;
        }
        return view('admin.home', ['categories' => $categories, 'pics' => $pics]);
    }
    
    public function login(Request $request){
        if(Admin::isLoggedIn()){
            return redirect('/admin');
        }
        if($request->isMethod('post')){
            $input = $request->input();
            if(strtolower($input['username']) === config('constants.username') && $input['password'] === config('constants.password')){
                Session::put('user_id', md5(strtolower($input['username'])));
            }
            return redirect('/admin');
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
            
            // Saving Data
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
    
    public function goHome(){
        Session::forget('user_id');
        return redirect('/');
    }
    
    public function addPicture(Request $request){
        if($request->isMethod('post')){
            // Validating Data
            $this->validate($request, [
                'source' => 'required',
                'name' => 'required|unique:categories|max:255',
                'description' => 'required',
                'category' => 'required'
            ]);
            $Picture = new Picture();
            $img_url = $Picture->createImg($request->source, 600, 600);
            
            $Picture->name = $request->name;
            $Picture->source = $img_url;
            $Picture->description = $request->description;
            $Picture->category_id = $request->category;
            
            if($Picture->save()){
                Session::flash('note.ok', 'Picture Successfully Saved');
            }else{
                Session::flash('note.error', 'Something Goes Wrong');
            }
            return redirect('/admin/addPicture');
        }
        $Category = new Category();
        $categories = $Category->getByType();
        return view('admin.addPicture', ['categories' => $categories]);
    }
    
    public function lastUpdates(){
        return view('admin.lastUpdates');
    }
    
}