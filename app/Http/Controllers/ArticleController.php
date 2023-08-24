<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Image;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::with('images')->get();
        $tags=Tag::all();
       
        

        return view('articles.index',[
            'articles'=>$articles,
            'tags'=>$tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $tags=Tag::all();
        return view('articles.create',[
            'tags'=>$tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
       
        $article= new Article;
        $article->title=$request->titolo;
        $article->content=$request->contenuto;
        $article->user_id=auth()->user()->id;
        $article->save();
        if ($request->file('immagine')) {
            $images=$request->file('immagine');//! questa variabile contiene un array di immagini
            $images_column=[];
            foreach($images as $image){
                $imageId=uniqid();
                $imageName="article-image-". $imageId . "." . $image->extension();
                $images_column[]=['image_name'=>$imageName,'image_id'=>$imageId,'article_id'=>$article->id];
                Image::insert(
                    $images_column
                );
                $image=$image->storeAs('public/images',$imageName);
            }

            
        } 
        $tags=$request->tag;
        foreach($tags as $tag){
            $current_article=Article::find($article->id);
            $current_article->tags()->attach($tag);
        }
        return redirect()->route('home.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article=Article::find($id);
        $article_images=Image::find($id);
        return view('articles.show',[
            'article'=>$article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article=Article::find($id);
        $tags=Tag::all();
        if(auth()->user()->id==$article->user_id){
            return view('articles.edit',
            [
                'article'=>$article,
                'tags'=>$tags
            ]
        );
        }else{
            return redirect()->route('home.error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $article=Article::find($id);

        if(auth()->user()->id==$article->user_id){

            $article->title=$request->titolo;
            $article->content=$request->contenuto;
            if ($request->hasFile('immagine')) {
                //!se dall'utente mi arrivano delle immagini nuove, elimino quelle che ci sono
                foreach($article->images as $image){//*$article->images fa riferimento alla relazione creata nel model Article
                    Storage::delete('public/images'.$image->image_name);
                    $image->delete();
                }

                $images=$request->file('immagine');

                foreach ($images as $image) {
                    $imageId=uniqid();
                    $imageName="article-image-". $imageId . "." . $image->extension();

                    $article_image = new Image;
                    $article_image->image_name = $imageName;
                    $article_image->image_id = $imageId;
                    $article_image->article_id = $id;
                    $article_image->save();
    
                    // Carica la nuova immagine nel disco
                    $image->storeAs('public/images', $imageName);
    
                }
            }

            $article->save();

            $tags=$request->tag;
            $current_article=Article::find($article->id);
            $current_article->tags()->detach();//!ho prima eliminato il record precendente nel caso ci fosse già--> non passo nessun parametro alla funzione detach in modo tale che elimini tutti i tag esistenti.
            foreach($tags as $tag){
                
                $current_article->tags()->attach($tag);//!salvo il nuovo record 
            }
            return redirect()->route('articles.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article=Article::find($id);
        foreach($article->images as $image){
            Storage::delete('public/images/'.$image->image_name);
            $image->delete();
        }
        $article->delete();
        return redirect()->route('articles.index');
    }
}
