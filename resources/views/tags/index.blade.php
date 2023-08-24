<x-layout>
    @foreach ($tags as $tag)
        <h3>{{$tag->name}}</h3>
        <form action="{{route('tags.destroy',$tag->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Elimina">
        </form>
        <a href="{{route('tags.edit',$tag->id)}}">Modifica</a> <br>
    @endforeach
</x-layout>