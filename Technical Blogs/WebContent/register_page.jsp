<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Register Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
<link href="../css/mystyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .banner-background{
         clip-path: polygon(30% 0%, 70% 0%, 100% 0, 100% 89%, 64% 99%, 31% 89%, 0 97%, 0 0);
    
    }
    .primary-background{
         background:blue;
    
    
    }
    
</style>
</head>
<body>
<%@include file="normal_navbar.jsp" %>
	<main class="d-flex align-items-center primary-background banner-background " style="height: 80vh; padding-bottom: 80px; padding-top: 6px;"> 
		<div class="container">
			<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="card">
				<div class="card-header primary-background text-white text-center">
					<p>Register Here</p>
					<span class="fa fa-user-circle fa-3x "></span>
				
				</div>
				<div class="card-body">
				
				
				</div>
				<div class="card-body">
<form id="reg-form" action="RegisterServelet" method="post">

  <div class="form-group">
    <label for="user_name">User Name</label>
    <input  name="user_name" type="text" class="form-control" id="user_name" aria-describedby="emailHelp" placeholder="Enter your Name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="user_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="user_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input name="check" type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Terms and Conditions</label>
  </div>
  <br>
  
  <span class="fa fa-refresh fa-spin fa-2x"></span>
  
  
  <button   type="submit" class="btn btn-primary">Submit</button>
  
  
  
</form>
				
				</div>
		
		</div>
		</div>
		</div>
		</div>
		
	
	</main>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="js/myjs.js" type="text/javascript"> </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
	$(document).ready(function (){
		console.log("loaded...")

		$('#reg-form').on('submit',function(event){
			event.preventDefault();

			let form=new FormData(this);
			

			$.ajax({
   					url:"RegisterServelet",
   					type:'POST',
   					data:form,
   					success: function (data,textStatus,jqXHR){
						   console.log(data)

						   swal("Successfully Registered....we redirecting to login page")
						   .then((value) => {
						     window.location="login_page.jsp"
						   });
						  
   	   					},
   	   					error: function(jqXHR,textStatus,errorThrown){

							console.log(jqXHR)
							 swal("Something went wrong.. try again")
						   
							
   	   	   					},

   	   	   					processData:false,
   	   	   					contentType:false


				});

			});
			


		
		  });
		

</script>



</body>
</html>