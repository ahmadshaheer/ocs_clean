@include('admin.include.header')
<?php
$session = Session::get('lang');
global $jdate;

 ?>

<style>
    .file {
      visibility: hidden;
      position: absolute;
    }
    


</style>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
        <div class="col-md-11">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Media
                        </header>
                        <div class="panel-body">
                          @if($errors->any())
                            <ul class="alert alert-danger">
                              @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                              @endforeach
                            </ul>
                          @endif
                            <div class="form cmxform form-horizontal">
                                {!! Form::model($media, ['route' => array('media.update',$media->id),'files' =>true]) !!}
                                <input name="_method" type="hidden" value="PATCH">

                                @if($session=='dr')
                                  <div class="form-group ">
                                      <label for="title_dr" class="control-label col-lg-3">Title Dari</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control rtl" id="title_dr" value="{{$media->title_dr}}" name="title_dr" type="text">
                                      </div>
                                  </div>
                                  <div class="form-group form-check">
                                    <label class="col-lg-6 col-md-offset-1 form-check-label">
                                      <input type="checkbox" id="change_date" name="change_date" class="form-check-input">
                                      Change Date?
                                    </label>
                                  </div>
                                  <div class="form-group date_dari">
                                      <label for="date_dr" class="control-label col-lg-3">Date Dari</label>
                                      <div class="col-lg-6">
                                        <input class="form-control change_date" disabled id="date_dr" value="{{$jdate->detailedDate($media->date_dr,$session)}}"  name="date_dr" type="text" required>
                                      </div>
                                  </div>
                                  {{-- <div class="form-group ">
                                      <label for="date_dr" class="control-label col-lg-3">Date Dari</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control date_dr rtl"  id="date_dr" value="{{$media->date_dr}}" name="date_dr" type="text" required>
                                      </div>
                                  </div> --}}
                                  <div class="form-group ">
                                      <label for="short_desc_dr" class="control-label col-lg-3">Short Description Dari</label>
                                      <div class="col-lg-6">
                                          <textarea name="short_desc_dr" class="form-control rtl"> {{$media->short_desc_dr}}</textarea>
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                      <label for="desc_dr" class="control-label col-lg-3">Description Dari</label>
                                      <div class="col-lg-6">
                                          <textarea name="desc_dr" class="form-control format rtl"> {{$media->description_dr}}</textarea>
                                      </div>
                                  </div>

                                @elseif($session=='pa')
                                  <div class="form-group ">
                                      <label for="title_pa" class="control-label col-lg-3">Title Pashto</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control rtl" id="title_pa" value="{{$media->title_pa}}" name="title_pa" type="text">
                                      </div>
                                  </div>

                                  <div class="form-group ">
                                      <label for="date_dr" class="control-label col-lg-3">Date Pashto</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control date_dr rtl"  id="date_dr" value="{{$media->date_dr}}" name="date_dr" type="text" required>
                                      </div>
                                  </div>


                                  <div class="form-group ">
                                      <label for="short_desc_pa" class="control-label col-lg-3">Short Description Pashto</label>
                                      <div class="col-lg-6">
                                          <textarea name="short_desc_pa" class="form-control rtl"> {{$media->short_desc_pa}}</textarea>
                                      </div>
                                  </div>

                                  <div class="form-group ">
                                      <label for="desc_pa" class="control-label col-lg-3">Description Pashto</label>
                                      <div class="col-lg-6">
                                          <textarea name="desc_pa" class="form-control format rtl">{{$media->description_pa}}</textarea>
                                      </div>
                                  </div>

                                @elseif ($session=='en')
                                  <div class="form-group">
                                      <label for="title" class="control-label col-lg-3">Title</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control" id="title" value="{{$media->title_en}}" name="title" type="text">
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                      <label for="date" class="control-label col-lg-3">Date</label>
                                      <div class="col-lg-6">
                                          <input class=" form-control" id="date" value="{{$media->date_en}}"  name="date" type="date" required>
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                      <label for="short_desc_en" class="control-label col-lg-3">Short Description English</label>
                                      <div class="col-lg-6">
                                          <textarea name="short_desc_en" class="form-control"> {{$media->short_desc_en}}</textarea>
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                      <label for="desc_en" class="control-label col-lg-3">Description English</label>
                                      <div class="col-lg-6">
                                          <textarea name="desc_en" class="form-control format">{{$media->description_en}}</textarea>
                                      </div>
                                  </div>
                                      <div class="form-group">
                                      <label for="" class="control-label col-lg-3">Tags</label>
                                      <div class="col-lg-6">
                                        <div class="ui fluid multiple search selection dropdown" id="tags">
                                          <input name="tags" type="hidden">
                                          <i class="dropdown icon"></i>
                                          <div class="default text">Tags</div>
                                          <div class="menu" id="menu">
                                            {{-- tag from jquery comes here --}}
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                @endif
                                <div class="form-group form-check">
                                  <label class="col-lg-6 col-md-offset-1 form-check-label">
                                    <input type="checkbox" id="replace_image" name="replace" class="form-check-input">
                                    Replace Image?
                                  </label>
                                </div>
                                <div class="form-group" id="image_upload">
                                    <label for="image" class="control-label col-lg-3">Image</label>
                                    <input type="file" name="image" class="file" value="{{$media->image}}">
                                    <div class="input-group col-md-6 col-md-offset-1 col-xs-12" style="padding-left:15px; padding-right:14px;">
                                      <span class="input-group-addon"><i class="fa fa-file-image-o"></i></span>
                                      <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                      <span class="input-group-btn">
                                        <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-folder-open"></i> Browse</button>
                                      </span>
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="{{$media->type}}">


                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a href="javascript:void(0)" onclick="clearForm()" class="btn btn-warning"  type="button">Clear All</a>
                                        <a href="{{url()->previous()}}" class="btn btn-default"  type="button">Cancel</a>
                                    </div>
                                </div>
                               {!! Form::close() !!}
                            </div>
                        </div>
                    </section>
        </div>

</section>

@include('admin.include.footer')
<script>
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });

</script>
