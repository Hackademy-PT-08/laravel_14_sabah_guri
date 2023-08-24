<x-layout>
    <h1 class="text-center">Profilo di {{auth()->user()->name}} </h1>
        <x-form-errors/>
        {{-- form per aggiornare il profilo --}}
        <form action="/user/profile-information" method="post">
            <h2 class="h4">Aggiorna informazioni utente</h2>
            @csrf
            @method('PUT')
            <input class="form-control-sm" type="text" name="name" placeholder="Nome Cognome" value="{{auth()->user()->name}}">
            <input class="form-control-sm" type="email" name="email" placeholder="Email" value="{{auth()->user()->email}}" >
            <input class="btn btn-sm btn-secondary" type="submit" value="Aggiorna">
    
        </form>


        <form class="mt-5" action="/user/password" method="post">
            <h2 class="h4">Aggiorna password</h2>
            @csrf
            @method('PUT')
            <input class="form-control-sm" type="password" name="current_password" placeholder="Password Attuale" >
            <input class="form-control-sm" type="password" name="password" placeholder="Nuova password" >
            <input class="form-control-sm" type="password" name="password_confirmation" placeholder="Conferma password" >
            <input class="btn btn-sm btn-secondary" type="submit" value="Aggiorna password">
    
        </form>

      
        <div class="row mt-5 mb-5">

            <h3 class="text-center">Tutti i tuoi articoli</h3>
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
                            <p class="small"><a   href="{{route('articles.edit',[$article])}}" style="text-decoration: none">Modifica</a></p>
                            <form action="{{route('articles.destroy',$article->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Elimina" class="btn btn-secondary">
                            
                            </form>
                        </div>
                    </div>
                </div>               
            @endforeach
        </div>
         

</x-layout>