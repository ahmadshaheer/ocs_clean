@include('admin.include.header')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Words</h2>
        </div>
<div class="container pull-left" style="margin:10px;">
@if(Session::get('role')!='editor')
  <div class="ui form">
    <div class="eight fields">
      <div class="field">
        <select name="lang" id="lang">
          <option value="0">Create...</option>
          <option value="dr_word">dari</option>
          <option value="pa_word">pashto</option>
          <option value="en_word">English</option>
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
      <th>President's Word</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    @foreach($words as $value)
    <?php
      if($value->short_desc_en!=null)
        $lang = "en";
      elseif($value->short_desc_dr!=null)
        $lang = "dr";
      else
        $lang = "pa";

      $short_desc = "short_desc_".$lang;
       ?>
    <tr>
      <th><img src="{{asset('uploads/word/'.$value->image)}}" style="width:100px;"></th>
      <td>{{$value->$short_desc}}</td>
      <td>
      <form action="{{ route('the_president.destroy', $value->id) }}" class="ui form" method="POST">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          {{-- <a href="{{route('the_president.edit',$value->id)}}" class="ui tiny button blue ">Edit</a> --}}
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
    window.location = "{{url('admin/set_session?lang=')}}"+id+"&route={{route('the_president.create')}}";
  });

  $(".edit_lang").change(function(){
    var lang = $(this).val().substring(0,2);
    var id = $(this).val().substring(3);
    window.location = "{{url('admin/set_session?lang=')}}"+lang+"&route={{url('admin/the_president/')}}"+"/"+id+"/edit";
  });

</script>
