<x-layout>
    <h1 class="text-center">Tutti i nostri articoli</h1>

     <div class="container py-5 my-5">
        <div class="row mb-5">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 mb-5">
                    <div class="card" style="max-height: 500px;">
                        @foreach ($article->images as $image)
                            <img src="{{asset('storage/images/'.$image->image_name)}}" alt="">
                        @endforeach
                        
                        <div class="card-body">
                            <p class="h2 card-title">{{$article->title}} </p>
                            <p class="card-text">{{$article->content}}</p>
                            @foreach ($article->tags as $tag)
                                <span class="badge badge-secondary text-black"><a href="{{route('tags.show',$tag->id)}}">Tag: {{$tag->name}}</a></span>
                            @endforeach

                            @if (auth()->check())
                            <p class="small"><a   href="{{route('articles.edit',[$article])}}" style="text-decoration: none">Modifica</a></p>
                            <form action="{{route('articles.destroy',$article->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Elimina" class="btn btn-secondary">
                            
                            </form>
                            @endif
                        </div>
                    </div>
                </div>               
            @endforeach
        </div>
    </div> 
</x-layout>
