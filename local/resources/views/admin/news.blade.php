
@include('admin.include.header')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">News</h2>
        </div>
<div class="container pull-left" style="margin:10px;">
@if(Session::get('role')!='editor')
  <div class="ui form">
    <div class="eight fields">
      <div class="field">
        <select name="lang" id="lang">
          <option value="0">Create...</option>
          <option value="dr_news">dari</option>
          <option value="pa_news">pashto</option>
          <option value="en_news">English</option>
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
      <th>Short Description</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    @foreach($news as $value)
    @if($value->title_en!=null)
    <?php $lang = "en"; ?>
    @elseif($value->title_dr!=null)
    <?php $lang = "dr"; ?>
    @else
    <?php $lang = "pa"; ?>
    @endif
    <?php
    $title = "title_".$lang;
    // print_r($value);exit;
    $date = "date_".$lang;
    $short_desc = "short_desc_".$lang;
     ?>
    <tr>
      <th><img src="{{asset('uploads/media/news/'.$value->image)}}" style="width:100px;"></th>
      <td><div style="width:20em" class="test">{{$value->$title}}</div></td>
      <td><div style="width:10em" class="test">{{$value->$date}}</div></td>
      <td style="">{{$value->$short_desc}}</td>

      <td style="width:20em;">
      <form action="{{ route('media.destroy', $value->id) }}" class="ui form" method="POST">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <div class="small field" style="float:left;padding-right:5px;">
            <select name="lang" class="edit_lang" id="edit_lang">
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
    window.location = "{{url('admin/set_session?lang=')}}"+id+"&route={{route('media.create')}}";
  });

  $("#edit_lang").change(function(){
    var lang = $(this).val().substring(0,2);
    var id = $(this).val().substring(3);
    window.location = "{{url('admin/edit_session?lang=')}}"+lang+"&route={{url('admin/media/')}}"+"/"+id+"/edit";
  });
</script>
