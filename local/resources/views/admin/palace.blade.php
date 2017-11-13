@include('admin.include.header')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Presidential Palace</h2>
        </div>
<div class="container pull-left" style="margin:10px;">
  @if(sizeof($palace)==0 && Session::get('role')!='editor')
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
      <th>Presidential Palace</th>
    </tr>
  </thead>
  <tbody>
    @foreach($palace as $value)
      <?php
      if($value->title_en!=null)
        $lang = "en";
      elseif($value->title_dr!=null)
        $lang = "dr";
      else
        $lang = "pa";

      $desc = "desc_".$lang;
       ?>
    <tr>
      <td><div style="width:60em" class="test">{!!$value->$desc!!}</div></td>
      <td>
        <form action="{{ route('the_bio.destroy', $value->id) }}" class="ui form" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="small field" style="float:left;padding-right:5px;">
              <select name="edit_lang" class="edit_lang">
                  <option value="0">Edit...</option>
                  <option value="dr_{{$value->id}}">dari</option>
                  <option value="pa_{{$value->id}}">Pashto</option>
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
    window.location = "{{url('admin/set_session?lang=')}}"+id+"&route={{route('the_palace.create')}}";
  });

  $(".edit_lang").change(function(){
    var lang = $(this).val().substring(0,2);
    var id = $(this).val().substring(3);
    window.location = "{{url('admin/set_session?lang=')}}"+lang+"&route={{url('admin/the_palace/')}}"+"/"+id+"/edit";
  });

</script>
