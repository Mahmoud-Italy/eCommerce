 @foreach($subCat as $sub)    
 <li><a href="{{ url('subcat/'.str_replace(' ','-',$sub->name).'/'.$sub->id) }}">{{$sub->name}}</a></li>
 @endforeach