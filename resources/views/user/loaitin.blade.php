@foreach($loaitin as $l)
<li style="list-style: none;"><a style="text-decoration:none;" href="/tintrongloai/{{$l->id}}">{{$l->ten}}</a></li>
@endforeach