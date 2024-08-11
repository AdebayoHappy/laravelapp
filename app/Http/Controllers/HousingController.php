<?php

namespace App\Http\Controllers;

use App\Models\housesfiles;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HousingController extends Controller
{
    public function index(){

        return view('house.index', [
            'Houses'=> housesfiles::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //shpw single listing
    public function show(housesfiles $house){
        return view('house.show',[
            'house'=>$house
          ]);
    }

    //create listing
    public function create(){
        return view('house.create');
    }
    //store listing
    public function store(Request $request){
        $formField= $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('housesfiles','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        if($request->hasFile('logo')){
            $formField['logo']=$request->file('logo')->store('logos', 'public');
        }

        $formField['user_id']=auth()->id();
        housesfiles::create($formField);
        return redirect('/')->with('message', 'housing created successfully');
    }
    public function edit(housesfiles $house){
        // dd($house->title);
         return view('house.edit',[
            'house'=>$house
         ]);
    }

    public function update(Request $request, housesfiles $house){

        if($house->user_id != auth()->id()){
               abort(403, 'Unauthorized Actions');
        };
        $formField= $request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        if($request->hasFile('logo')){
            $formField['logo']=$request->file('logo')->store('logos', 'public');
        }

     

        $house->update($formField);
        return back()->with('message', 'housing updated successfully');
    }


    public function delete(housesfiles $house){
        if($house->user_id != auth()->id()){
            abort(403, 'Unauthorized Actions');
     };
     
         $house->delete();
         return redirect('/')->with('message', 'Housing deleted successfully');
    }

    // Managing listing
    public function manage(){
        return view('house.manage',['housings'=>auth()->user()->listing()->get()]);
    }
}
