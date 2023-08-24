<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;

class TagController extends Controller
{
    public function index(){
        $tags=Tag::all();

        return view('tags.index',
        [
            'tags'=>$tags
        ]);
    }

    public function create(){
        return view('tags.create');
    }



    public function store(Request $request){
        $tag=new Tag;

        $tag->name=$request->nome;

        $tag->save();

        return redirect()->route('tags.index');
    }


    public function edit($id){
        $tag=Tag::find($id);
        return view('tags.edit',
        [
            'tag'=>$tag
        ]);
    }



    public function update(Request $request ,$id){
        $tag=Tag::find($id);

        $tag->name=$request->nome;
        $tag->save();

        return redirect()->route('tags.index');
    }

    public function show($id){
        
        $tag=Tag::find($id);
        return view('tags.show',[
            'articles'=>$tag->articles,
            'tag'=>$tag
        ]);
    }

    public function destroy($id){
        $tag=Tag::find($id);
        $tag->delete();
        return redirect()->route('tags.index');
    }
}


