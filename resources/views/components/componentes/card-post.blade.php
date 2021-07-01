<article class="" style="padding:10px;">
  <img class="" height="300" width="1000" src="{{asset('storage').'/'.$posts->image->url}}" alt="">

  <div style="padding: 8px;"class="">

    <p >

      <a style="font:bold; margin:bottom:2px;color: black;" href="{{route('post.show',$posts)}}">{{$posts->name}}</a>
    </p>

    <div class="text-gray" >
      <p>{{$posts->extract}}</p>
    </div>
  </div>

  <div style="padding:8px;" class="">

    @foreach ($posts->tags as $tag)
<a class=""  style="display:inline-block; padding:1px; height:25px; color:gray;background: #B0C4DE; border-radius:  6px;" href="#">{{$tag->name}}</a>
    @endforeach

  </div>


</article>
