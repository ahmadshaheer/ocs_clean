@include('admin.include.header')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Videos</h2>
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
      <th>#</th>
      <th>Video Title</th>
      <th>Attachement</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    @foreach($videos as $value)
    <tr>
      <th><?php echo $i++; ?></th>
      <td><div style="width:10em" class="test">{{$value->title_en}}</div></td>
      <td style="width:10%;"><a href="https://www.youtube.com/embed/{{$value->url_en}}" target="_blank"><i class="fa fa-file-video-o"></i></a></td>

      <td>
      <form action="{{ route('videos.destroy', $value->id) }}" class="ui form" method="POST">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <div class="small field" style="float:left;padding-right:5px;">
            <select name="lang" class="edit_lang">
              <option value="0">Edit...</option>
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
  $("#lang").change(function(){
    var id = $(this).val();
    window.location = "{{url('admin/set_session_all?lang=')}}"+id+"&route={{route('videos.create')}}";
  });

  $(".edit_lang").change(function(){
    var lang = $(this).val().substring(0,2);
    var id = $(this).val().substring(3);
    window.location = "{{url('admin/edit_session?lang=')}}"+lang+"&route={{url('admin/videos/')}}"+"/"+id+"/edit";
  });
</script>
