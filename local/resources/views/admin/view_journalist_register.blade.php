@include('admin.include.header')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
    <div class="table-responsive ui stacked segment" style="">
        <div class="row">
          <h2 class="ui block header">Users</h2>
        </div>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>License Number</th>
      <th>Type</th>
      <th>Coverage area</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    @foreach($journalist as $user)
    <tr>
      <th><?php echo $i++; ?></th>
      <td><div class="test">{{$user->name}}</div></td>
      <td><div class="test">{{$user->license_number}}</div></td>
      <td><div class="test">{{$user->type}}</div></td>
      <td><div class="test">{{$user->coverage_area}}</div></td>
      <td>
      <form action="" method="POST">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <button class="ui tiny label red " onclick="return confirm_submit()">Delete</button>
      </form>
     
        
      </td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
</section>

@include('admin.include.footer')