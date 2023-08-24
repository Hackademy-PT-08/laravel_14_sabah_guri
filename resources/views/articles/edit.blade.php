<x-layout>
    @if(auth()->check())
        <x-form-errors/>
    
        <div class="container">
        <div class="row justify-content-center">
            <div class=" col-12 col-md-8">
                <h4 class="h1 text-center">Modifica {{$article->title}}</h4>
                <form action="{{route('articles.update',$article->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="titolo" placeholder="titolo articolo" class="form-control" value="{{$article->title}}">
                    
                <textarea name="contenuto"  cols="3" rows="3" placeholder="Descrizione articolo" class="form-control">{{$article->content}}</textarea>
                <input type="file" class="form-control" name="immagine[]" multiple >

                {{-- ! slect modifica tag --}}
                <label for="tag">Tag</label>
                <select name="tag[]" id="tag" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}" {{$article->tags->contains($tag->id) ? 'selected' : ''}}>{{$tag->name}}</option>
                    @endforeach
                </select>
                
                <button type="submit"  class="btn btn-primary mt-1">Modifica</button>
                </form> 
            </div>
        </div>
        </div>
    @endif
</x-layout>