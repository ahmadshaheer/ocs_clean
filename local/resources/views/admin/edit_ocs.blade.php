@include('admin.include.header')
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
                            Edit OCS Description
                        </header>
                        <div class="panel-body">
                            <div class="form cmxform form-horizontal">
                                {!! Form::model($ocs, ['route' => array('the_ocs.update',$ocs->id),'files' =>true]) !!}
                                <input name="_method" type="hidden" value="PATCH">
                                    @if($session=='en')
                                      <div class="form-group ">
                                        <label for="desc_en" class="control-label col-lg-3">Description English</label>
                                        <div class="col-lg-9">
                                            <textarea name="desc_en" class="form-control format">{{$ocs->desc_en}}</textarea>
                                        </div>
                                    </div>
                                    @elseif($session=='dr')
                                    <div class="form-group ">
                                        <label for="desc_dr" class="control-label col-lg-3">Description Dari</label>
                                        <div class="col-lg-9">
                                            <textarea name="desc_dr" class="form-control format">{{$ocs->desc_dr}}</textarea>
                                        </div>
                                    </div>
                                     @else
                                    <div class="form-group ">
                                        <label for="desc_pa" class="control-label col-lg-3">Description Pashto</label>
                                        <div class="col-lg-9">
                                            <textarea name="desc_pa" class="form-control format">{{$ocs->description_en}}</textarea>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
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