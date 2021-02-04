<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    </head>
    <body>
    <div class="container">
        <h1 class="text-primary text-uppercase text-center"> Ajax CRUD Operations</h1>
        <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-warning"data-toggle="modal" data-target="#myModal">REGISTER</button>
        <button class="btn btn-secondary" onclick="loadm()">Load More</button>
        </div>
        <h3 class="text-danger text-uppercase"> All Records</h3>
        <div id="records_contant"></div>
        <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">AJAX CRUD OPERATIONS</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
            <label> Firstname:</label>
            <input type="text" name="" id="firstname" class="form-control" placeholder="First Name">
        </div>
        <div class="form-group">
            <label> Lastname:</label>
            <input type="text" name="" id="lastname" class="form-control" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label> Email id:</label>
            <input type="email" name="" id="email" class="form-control" placeholder="Email ID">
        </div>
        <div class="form-group">
            <label> Contact No.:</label>
            <input type="text" name="" id="mobile" class="form-control" placeholder="Contact Number">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()" >Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>




<div class="modal" id="updateuserModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">UPDATE PROFILE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
            <label> Firstname:</label>
            <input type="text" name="" id="updfirstname" class="form-control"  placeholder="Firstname">
        </div>
        <div class="form-group">
            <label> Lastname:</label>
            <input type="text" name="" id="updlastname" class="form-control" placeholder="Lastname" >
        </div>
        <div class="form-group">
            <label> Email id:</label>
            <input type="email" name="" id="updemail" class="form-control" placeholder="Email id" >
        </div>
        <div class="form-group">
            <label> Contact No.:</label>
            <input type="text" name="" id="updmobile" class="form-control" placeholder="Mobile">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="update1()" >Save Changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <input type="hidden" name="" id="h">
      </div>

    </div>
  </div>
</div>




</div>
 



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
    readRecords();
})
function readRecords(){
    var readrecord = "readrecord";
    $.ajax({
        url: "backend1.php",
        type:"post",
        data: {readrecord:readrecord },
        success:function(data,status){
            $('#records_contant').html(data);
        }
    });
}
function addRecord(){
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();
    $.ajax({
        url:"backend1.php",
        type:'post',
        data:{firstname:firstname,
        lastname: lastname,
        email:email,
        mobile:mobile
        },
        success:function(data,status){
            readRecords();
        }
    });
  }



    //////delete record
    function DeleteUser(deleteid){
        var conf = confirm("Are you sure?");
        if(conf==true){
            $.ajax({
                url:"backend1.php",
                type:"post",
                data:{deleteid:deleteid},
                success:function(data,status){
                    readRecords();
                }
            });
        }
    }


    ///////
    function getsno(id)
    {
      $("#h").val(id);
      $('#updateuserModal').modal("show");
    }

    function update1()
    {
      var firstname = $("#updfirstname").val();
     var lastname = $("#updlastname").val();
     var email = $("#updemail").val();
     
     var mobile = $("#updmobile").val();
      var y = $("#h").val();

      $.ajax({

        url : "update.php",
        type : "POST",
        data : {
          firstname : firstname,
          email : email,
          lastname : lastname,
          mobile : mobile, 
          id : y
        },
        success : function(data){
          readRecords();
        }

      });

    }
    ////////
    var x = 0;
            
        function loadm()
        {
             x = x + 3;

            $.ajax({
                url : "loadmore.php",
                type : "POST",
                data : {
                    x : x
                },
                success : function(data){
                    $("#records_contant").html(data);
                }
            });

        }
 
</script>    
</body>
</html>