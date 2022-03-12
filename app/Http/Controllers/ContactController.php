<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Contacts;
use PDOException;

class ContactController extends Controller
{
  
    public function index(){
        $contacts = DB::table('contacts')->get();
       // dd($contacts);
        return view('contact.index', compact('contacts'));
    }
    public function new(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('contact.newContact');
    }
    public function show($id){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
         $contact = DB::table('contacts')->where('id', $id)->first();
        return view('contact.showContact', compact('contact'));
    }
    public function edit($id){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
         $contact = DB::table('contacts')->where('id', $id)->first();
        return view('contact.editContact', compact('contact'));
    }
     public function update(Request $request){

        $i = DB::table('contacts')->where('contact', $request->contact)->where('email', $request->email)->count();
        if($i>1){
             $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'contact' => 'required|min:9|max:9|unique:contacts',
            'email' => 'required|email|unique:contacts',
        ]);
        }else{
            $validator = Validator::make($request->all(), [
                    'name' => 'required|min:5',
                    'contact' => 'required|min:9|max:9',
                    'email' => 'required|email',
                ]);
        }
        // dd($i);
        
 
        if ($validator->fails()) {
          return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
    try{
         $contacts = Contacts::find($request->id);  
    
        $contacts->name = $request->name;
        $contacts->contact = $request->contact;
        $contacts->email = $request->email;
        $contacts->save();
        //$request->session()->put('msg', 'Contact has been successfully registered');
 
            $validator->errors()->add(
                'msg', 'Contact has been successfully registered'
            );
         return redirect()->route('contact.index')->withErrors($validator);
        
        
       
    } catch (PDOException $ex) {
            // $request->session()->put('error', $ex->getMessage());
        $validator->errors()->add(
            'error', 'Error:'. $ex->getMessage()
        );
        return redirect()->back()->withErrors($validator);
        }
 
    
}
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'contact' => 'required|min:9|max:9|unique:contacts',
            'email' => 'required|email|unique:contacts',
        ]);
 
        if ($validator->fails()) {
          return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
    try{
          $contacts = new Contacts();   
        
       
        $contacts->name = $request->name;
        $contacts->contact = $request->contact;
        $contacts->email = $request->email;
        $contacts->save();
        //$request->session()->put('msg', 'Contact has been successfully registered');
        
             $validator->errors()->add(
                'msg', 'Contact has been successfully registered'
            );
         return redirect()->back()->withErrors($validator);
        
        
       
    } catch (PDOException $ex) {
            // $request->session()->put('error', $ex->getMessage());
        $validator->errors()->add(
            'error', 'Error:'. $ex->getMessage()
        );
        return redirect()->back()->withErrors($validator);
        }
 
    
}
     public function showDelete($id){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
         $contact = DB::table('contacts')->where('id', $id)->first();
        return view('contact.showDeleteContact', compact('contact'));
    }
    public function delete($id){
        if (!Auth::check()) {
                return redirect()->route('login');
            }
             $contact = DB::table('contacts')->where('id', $id)->delete();
            //  dd($contact);
            return redirect()->route('contact.index');
        }
}
