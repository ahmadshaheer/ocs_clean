 rtl@include('admin.include.header')
<?php $session = Session::get('lang');?>
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
                            Edit Media Directorate Description
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
                                {!! Form::model($media, ['route' => array('media_directorate.update',$media->id),'files' =>true]) !!}
                                <input name="_method" type="hidden" value="PATCH">
                                    @if($session=='en')
                                      <div class="form-group ">
                                        <label for="desc_en" class="control-label col-lg-3">Description English</label>
                                        <div class="col-lg-9">
                                            <textarea name="desc_en" class="form-control format">{{$media->desc_en}}</textarea>
                                        </div>
                                    </div>
                                    @elseif($session=='dr')
                                    <div class="form-group ">
                                        <label for="desc_dr" class="control-label col-lg-3">Description Dari</label>
                                        <div class="col-lg-9">
                                            <textarea name="desc_dr" class="form-control format rtl">{{$media->desc_dr}}</textarea>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group ">
                                        <label for="desc_pa" class="control-label col-lg-3">Description Pashto</label>
                                        <div class="col-lg-9">
                                            <textarea name="desc_pa" class="form-control format rtl">{{$media->desc_pa}}</textarea>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Update</button>
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
