<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container pt-5">
<input class="form-control" id="filtertxt" type="text" placeholder="Search by User Name..">
<button type="button" class="btn btn-primary exportbtn">Export</button>
<a class="btn btn-primary" href="{{ url('export') }}">Export (All data of User)</a>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>S. No.</th>
      <!-- <th>S. No.</th> -->
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody id="qw">
        
    <?php $i=1; ?>
        @foreach($users as $userdata)
      <tr>
        <td><div class="custom-control custom-checkbox">
                  <input type="checkbox" name="chkid" value="{{$userdata->id}}" class="custom-control-input" id="{{$userdata->id}}customCheck">
                  <label class="custom-control-label" for="{{$userdata->id}}customCheck">{{$i}}</label>
              </div></td>
      <!-- <td>{{$i}}</td> -->
        <td>{{$userdata->name}}</td>
        <td>{{$userdata->email}}</td>
      </tr>
      
      <?php $i++; ?>
            @endforeach
    </tbody>
  </table>
  <!-- <p id="fpara">Paragraph</p> -->
</div>

</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">



$('#filtertxt').keyup(function () {

var stext = $('#filtertxt').val();
//alert(stext);



$.ajax({
      url: "/submit-form",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        stxt:stext,
      },
      success:function(response){
      
        $('#qw').html('');
        $('#qw').html(response);
        //console.log(response);
      },
      error: function(response) {
        
      },
      });


});


$(".exportbtn").click(function(){
    var seldata = [];
    var selids = $("input[name='chkid']:checked").map(function() {
        seldata.push(this.value);
     return this.value;
 }).get().join(',');





    $.ajax({
      url: "/export-data",
      type:"POST",
    //   data:{
    //     "_token": "{{ csrf_token() }}",
    //     ids:104,103,
    //   },
      data: {"_token": "{{ csrf_token() }}",seldata:seldata},
      //dataType: 'JSON',
      success:function(response){
     
     

      let blob = new Blob([response], { type: "application/vnd.ms-excel" });
                let link = URL.createObjectURL(blob);
                let a = document.createElement("a");
                a.download = "file.xlsx";
                a.href = link;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);



     
        //console.log(response);
      },
      error: function(response) {
       
      },
      });




});


  </script>

