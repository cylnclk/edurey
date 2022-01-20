<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function index()
    {
        $data['posts'] = Posts::all();
        return view('post.index' ,$data);
    }

    public function create()
    {
        return view('post.add');
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required'],
            'image' => ['required'],
            'active' => ['required'],

        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');
        $save = new Image();
        $save->name = $name;
        $save->path = $path;
        $data = [
            'title' => $request->title,
            'active' => $request->active,
            'image' => $request->image,
            'content' => $request->body,

        ];
        $data['image'] = $path;
        Posts::create($data);
        return  redirect()->route('post.index')->with('status', 'Duyuru Başarıyla Kaydedildi.');
    }


    public function show($id)
    {
        //
    }
    public function edit($id)
    {

        $data['post'] = Posts::find($id);
        return  view('post.edit', $data);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => ['required'],
            'image' => ['required'],
            'active' => ['required'],

        ]);
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');
        $save = new Image();
        $save->name = $name;
        $save->path = $path;
        $data = [
            'title' => $request->title,
            'active' => $request->active,
            'image' => $request->image,
            'content' => $request->body,

        ];
        $data['image'] = $path;
        Posts::find($id)->update($data);
         return redirect('/posts')->with('status', 'Duyuru Başarıyla Güncellendi!!');
    }
    public function destroy($id)
    {
        Posts::find($id)->delete();
        return back()->with('status', 'Duyuru Başarıyla Silindi.');
    }
    public function welcome(){

        $data['images'] = array();
        $data['posts'] = Posts::where('active','Yes')->get();
        $post = Posts::all();
    foreach ($post as $item){
        $url = parse_url($item->image);
        $url['sections'] = explode('/', $url['path']);
        $expense = $url['sections'][1].'/'.$url['sections'][2];
        array_push($data['images'], $expense);

    }

        return view('welcome',$data);
    }

}
