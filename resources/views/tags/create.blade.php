<x-layout>
    <x-form-errors/>

       
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-12 col-md-8">
                <h4 class="h1 text-center">Aggiungi tag</h4>
                <form action="{{route('tags.store')}}" method="POST">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome tag" class="form-control" value="{{old('nome')}}">
                    <button type="submit"  class="btn btn-primary mt-1">Aggiungi</button>
                </form> 
            </div>
        </div>
    </div>
        
        
     
       
 
</x-layout>
     