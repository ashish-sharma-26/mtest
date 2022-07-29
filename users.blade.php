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
<input class="form-control" id="filtertxt" type="text" placeholder="Search..">
<button type="button" class="btn btn-primary exportbtn">Export</button>
<a href="{{ url('export') }}">Export</a>
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
        <td>{{$userdata->name}}gdfgd</td>
        <td>{{$userdata->email}}</td>
      </tr>
      
      <?php $i++; ?>
            @endforeach
    </tbody>
  </table>
  <p id="fpara">Paragraph</p>
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
        // $('#nameErrorMsg').text(response.responseJSON.errors.name);
        // $('#emailErrorMsg').text(response.responseJSON.errors.email);
        // $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
        // $('#messageErrorMsg').text(response.responseJSON.errors.message);
      },
      });


});


$(".exportbtn").click(function(){
    var seldata = [];
    var selids = $("input[name='chkid']:checked").map(function() {
        seldata.push(this.value);
     return this.value;
 }).get().join(',');

//  alert("My favourite programming languages are: " + selids);



    $.ajax({
      url: "/export-data",
      type:"POST",
    //   data:{
    //     "_token": "{{ csrf_token() }}",
    //     ids:104,103,
    //   },
      data: {"_token": "{{ csrf_token() }}",seldata:seldata},
      dataType: 'JSON',
      success:function(response){
      
       // $('#qw').html('');
       // $('#qw').html(response);
        //console.log(response);
      },
      error: function(response) {
        // $('#nameErrorMsg').text(response.responseJSON.errors.name);
        // $('#emailErrorMsg').text(response.responseJSON.errors.email);
        // $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
        // $('#messageErrorMsg').text(response.responseJSON.errors.message);
      },
      });




});



$("#fpara").click(function(){
//   alert("The paragraph was clicked.");

// var programming = $("input[name='chkid']:checked").map(function() {
//      return this.value;
//  }).get().join(',');


//  alert("My favourite programming languages are: " + programming);





    $.ajax({
      url: "/submit-form",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        id:1,
      },
      success:function(response){
      
        $('#qw').html('');
        $('#qw').html(response);
        //console.log(response);
      },
      error: function(response) {
        // $('#nameErrorMsg').text(response.responseJSON.errors.name);
        // $('#emailErrorMsg').text(response.responseJSON.errors.email);
        // $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
        // $('#messageErrorMsg').text(response.responseJSON.errors.message);
      },
      });








});




// $('#SubmitForm').on('submit',function(e){
//     e.preventDefault();

//     let name = $('#InputName').val();
//     let email = $('#InputEmail').val();
//     let mobile = $('#InputMobile').val();
//     let message = $('#InputMessage').val();
    
//     $.ajax({
//       url: "/submit-form",
//       type:"POST",
//       data:{
//         "_token": "{{ csrf_token() }}",
//         name:name,
//         email:email,
//         mobile:mobile,
//         message:message,
//       },
//       success:function(response){
//         $('#successMsg').show();
//         console.log(response);
//       },
//       error: function(response) {
//         $('#nameErrorMsg').text(response.responseJSON.errors.name);
//         $('#emailErrorMsg').text(response.responseJSON.errors.email);
//         $('#mobileErrorMsg').text(response.responseJSON.errors.mobile);
//         $('#messageErrorMsg').text(response.responseJSON.errors.message);
//       },
//       });
//     });












// $(document).ready(function () {

// (function ($) {

//     $('#filter').keyup(function () {

//         var rex = new RegExp($(this).val(), 'i');
//         $('.searchable tr').hide();
//         $('.searchable tr').filter(function () {
//             return rex.test($(this).text());
//         }).show();

//     });
    
//     $('#filter2').on('change', function(){
        
//         if(this.checked){
//             $('.searchable tr').hide();
//             $('.searchable tr').filter(function() {
//                 return $(this).find('td').eq(3).text() !== "0"
//             }).show();
//         }else{
//             $('.searchable tr').show();
//         }
        
        
//     });

// }(jQuery));

// });
  </script>
