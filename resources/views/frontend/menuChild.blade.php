@if($cate->childrent->count())
<ul>
    @foreach($cate -> childrent as $c)
    <li><a href="{{url('/danh-muc/'. $c->slug . '/' . $c->id . '.html' )}}">{{$c->name}}</a></li>
    @endforeach
</ul>
@endif