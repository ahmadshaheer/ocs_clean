@include('admin.include.header')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Photo Album</h2>
        </div>
<div class="container pull-left" style="margin:10px;">
  @if(Session::get('role')!='editor')
    <div class="ui form">
      <div class="eight fields">
        <div class="field">
          <select name="lang" id="lang">
            <option value="0">Create...</option>
            <option value="dr">dari</option>
            <option value="pa">pashto</option>
            <option value="en">English</option>
          </select>
        </div>
      </div>
    </div>
  @endif
</div>
<table class="table">
  <thead>
    <tr>
      <th>Image</th>
      <th>Title</th>
      <th>Date</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    @foreach($album as $value)
    <?php
    if($value->title_en!=null)
      $lang = "en";
    elseif($value->title_dr!=null)
      $lang = "dr";
    else
      $lang = "pa";
    $title = "title_".$lang;
    // print_r($value);exit;
    $date = "date_".$lang;
    ?>
    <tr>
      <th><a href="{{url('admin/view_album_images/'.$value->id)}}"><img src="{{asset('uploads/album/'.$value->image)}}" style="width:100px;"></a></th>
      <td><div style="width:20em" class="test">{{$value->$title}}</div></td>
      <td><div style="width:10em" class="test">{{$value->$date}}</div></td>

      <td>
      <form action="{{ route('album.destroy', $value->id) }}" class="ui form" method="POST">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}

          @if(Session::get('role')!='editor')
          <select class="form-control me" id="add" name="image_num" style="width:30%;display:inline">
            <option value="">Add Images</option>
            <option value="1_{{$value->id}}">1</option>
            <option value="2_{{$value->id}}">2</option>
            <option value="3_{{$value->id}}">3</option>
          </select>
          @endif
          <a href="{{route('edit_images',$value->id)}}" class="ui tiny button black ">Edit Images</a>
          <div class="small field" style="float:left;padding-right:5px;">
            <select name="lang" class="edit_lang">
              <option value="0">Edit Album...</option>
              <option value="dr_{{$value->id}}">dari</option>
              <option value="pa_{{$value->id}}">pashto</option>
              <option value="en_{{$value->id}}">English</option>
            </select>
          </div>
          @if(Session::get('role')=='admin')
          <button class="ui tiny button red " onclick="return confirm_submit()">Delete</button>
          @endif
      </form>


      </td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
</section>

@include('admin.include.footer')
<script>

$(".me").change(function(){
    var num = $(this).val().substring(0,1);
    var id = $(this).val().substring(2);
    window.location = "{{url('admin/album/album_image')}}"+'/'+num+'/'+id;
  });



  $("#lang").change(function(){
    var id = $(this).val();
    window.location = "{{url('admin/set_session_all?lang=')}}"+id+"&route={{route('album.create')}}";
  });

  $(".edit_lang").change(function(){
    var lang = $(this).val().substring(0,2);
    var id = $(this).val().substring(3);
    window.location = "{{url('admin/edit_session?lang=')}}"+lang+"&route={{url('admin/album/')}}"+"/"+id+"/edit";
  });
</script>
