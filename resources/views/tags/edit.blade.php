<x-layout>
    <x-form-errors/>

       
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-12 col-md-8">
                <h4 class="h1 text-center">Modifica il tag :{{$tag->name}}</h4>
                <form action="{{route('tags.update',$tag->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="nome" placeholder="Nome tag" class="form-control" value="{{$tag->name}}">
                    <button type="submit"  class="btn btn-primary mt-1">Aggiungi</button>
                </form> 
            </div>
        </div>
    </div>
        
        
     
       
 
</x-layout>