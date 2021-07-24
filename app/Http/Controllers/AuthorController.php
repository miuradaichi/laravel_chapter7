<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $items = Author::all();
        return view ('index',['items' => $items]);
    }
    public function add(){
        return view('add');
    }
    public function find(){
        return view('find',['input' => '']);
    }
    public function search(Request $request){
        $item = Author::where('name','LIKE',"%{$request->input}%")->first();
        $param= [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find',$param);
    }
    public function bind(Author $author){
        $data = [
            'item' => $author,
        ];
        return view('author.binds',$data);
    }
    public function create(Request $request)
    {
        $this->validate($request, Author::$rules);
        $form = $request->all();
        Author::create($form);
        return redirect('/');
    }
    public function edit(Request $request)
    {
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Author::$rules);
        $form = $request->all();
        unset($form['_token']);
        Author::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete', ['form' => $author]);
    }
    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }
    public function relate(Request $request)
    {
        $hasItems = Author::has('book')->get();
        $noItems = Author::doesntHave('book')->get();
        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
        return view('author.index',$param);
    }
    // public function add(){
    //     return view('add');
    // }
    // public function create(Request $request){
    //     $param=[
    //         'name' => $request->name,
    //         'age' => $tequest->age,
    //         'nationality' => $request->nationality
    //     ];
    //     DB::table('authors')->insert($param);
    //     return redirect('/');
    // }
    // public function edit(Request $request){
    //     $param = ['id' => $request->id];
    //     $item = DB::table('authors')->where('id',$request->id)->first();
    //     return view('edit',['form' => $item]);
    // }
    // public function update(Request $request){
    //     $param=[
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'age' => $request->age,
    //         'nationality' => $request->nationality
    //     ];
    //     DB::table('authors')->where('id',$request)->update($param);
    //     return redirect('/');
    // }
    // public function delete(Request $request){
    //     $param = ['id' => $request->id];
    //     $item = DB::table('authors')->where('id',$request->id)->first();
    //     return view('delete',['form' => $item]);
    // }
    // public function remove(Request $request){
    //     $param = ['id' => $request->id];
    //     DB::table('authors')->where('id',$request->id)->delete();
    //     return redirect('/');
    // }
}
