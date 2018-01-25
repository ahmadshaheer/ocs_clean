@include('admin.include.header')
<?php 
if(Session::get('view_lang')==''){
  $lang='en';
}
else{
  $lang = Session::get('view_lang');
}
$title = "title_".$lang;
$date = "date_".$lang;
$short_desc = "short_desc_".$lang;
if($lang=='en'){
  $dir = 'left';
  $direction = 'ltr';
}
else{
 $dir = 'right'; 
 $direction = 'rtl';
}
$i=1;
?>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row ui block header">
          <h2>Messages</h2>
          <a class="btn btn-{{($lang=='en'?'success':'default')}}" href="javascript:void(0)" onclick="show('en')">English</a>
          <a class="btn btn-{{($lang=='dr'?'success':'default')}}" href="javascript:void(0)" onclick="show('dr')">Dari</a>
          <a class="btn btn-{{($lang=='pa'?'success':'default')}}" href="javascript:void(0)" onclick="show('pa')">Pashto</a>
        </div>
<div class="container pull-left" style="margin:10px;">
  @if(Session::get('role')!='editor')
  <a class="btn btn-default pull-{{$dir}}" href="javascript:void(0)" onclick="create('{{$lang}}')" style="margin-bottom: 10px;">Create</a>
  @endif
  </div>
  <table class="table table-bordered" style="direction: {{$direction}}">
    <thead>
      <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Date</th>
        <th>Short Description</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
      @foreach($messages as $value)
        <?php
       if($value->$title==''){
          if($value->title_en=='' && $value->title_dr!=''){
          $title_value = $value->title_dr;
        }
        else if($value->title_en=='' && $value->title_dr ==''){
         $title_value = $value->title_pa; 
        }
        else if($value->title_en=='' && $value->title_dr =='' && $value->title_pa=''){
          continue;
        }
       }
       else{
          $title_value = $value->$title;
       }
       ?>
      <tr>
        <td>{{$i++}}</td>
        <td><div style="width:25em;direction:{{($value->$title=='')?'rtl':'ltr'}};" class="test">{{$title_value}}</div></td>
        <td><div style="width:10em" class="test">{{$value->$date}}</div></td>
        <td style="">{{$value->$short_desc}}</td>

        <td>
        <form action="{{ route('the_president.destroy', $value->id) }}" class="ui form" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
           <a class="btn btn-default pull-{{$dir}}" href="javascript:void(0)" onclick="edit('{{$lang.'_'.$value->id}}')" style="margin-bottom: 10px;">{{($value->$title==''?'Add':'Edit')}}</a>
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
 function create(lang){
    var id = lang+"_message";
    window.location = "{{url('admin/set_session?lang=')}}"+id+"&route={{route('the_president.create')}}";
  }

  function edit(para){
    var lang = para.substring(0,2);
    var id = para.substring(3);
    window.location = "{{url('admin/edit_session?lang=')}}"+lang+"&route={{url('admin/the_president/')}}"+"/"+id+"/edit";
  }

  </script>
