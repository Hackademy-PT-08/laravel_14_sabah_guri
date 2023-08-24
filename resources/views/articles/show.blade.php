<x-layout>
    <h1>{{$article->title}}</h1>
    <p>{{$article->content}}</p>
   
    @foreach ($article_images as $article_image)
    
      
    @endforeach
</x-layout>