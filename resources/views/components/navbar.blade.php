<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home.index')}}">Il Giornale</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">Home</a>
          </li>
          @if (auth()->check())
            <li class="nav-item">
              <a class="nav-link" href="{{route('articles.index')}}">Tutti gli articoli</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('articles.create')}}">Aggiungi articolo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.profile')}}">Profilo</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{route('tags.index')}}">I tag</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{route('tags.create')}}">Aggiungi tag</a>
            </li> 
            <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
                <button class="btn btn-sm btn-secondary">Esci</button>
              </form>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="/login">Accedi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Registrati</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

