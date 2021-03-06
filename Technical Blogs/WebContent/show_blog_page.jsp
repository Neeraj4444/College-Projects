<%@page import="com.tech.blog.entities.*"%>
<%@page import="com.tech.blog.helper.*"%>
<%@page import="com.tech.blog.dao.*"%>
<%@page import="com.tech.blog.servelet.*"%>
<%@page import="java.util.*"%>


<!-- validating -->
<%
	User user = (User) session.getAttribute("currentUser");
if (user == null) {
	response.sendRedirect("login.jsp");

}
%>


<!-- fetching the postId -->
<%
	int postId = Integer.parseInt(request.getParameter("post_id"));
	PostDao d = new PostDao(ConnectionProvider.getConnection());
	
	Post p = d.getPostByPostId(postId);



%>



<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title><%= p.getpTitle() %></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	
<link href="../css/mystyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<style>

.primary-background {
	background: blue;
}

.post-title{

	font-weight:100;
	font-size:27px;
}

.post-content{
	font-weight: 100;
	font-size:20px;
	
}

.post-date{
	font-weight: italic;
	font-size: bold;

}
.post-user-info{
	font-size: 20px;
	font-weight: 150;
}

body{
	background:url("img/bg.png");
	background-size:cover;
	background-attachment: fixed;

}

</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="LAMA172g"></script>
</head>

<!--  To open particular post by clicking on read more of that post we need to get the id of that post -->
<body>

<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark primary-background">
		<a class="navbar-brand" href="index.jsp"> <span
			class="fa fa-asterisk"></span> Tech Blog
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="profile.jsp"><span
						class="fa fa-asterisk"></span>Learn code <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item dropdown"><a
					class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
					role="button" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false"> <span class="fa fa-check-square-o"></span>
						Categories
				</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Programming Language</a> <a
							class="dropdown-item" href="#">Project Implementation</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Data Structure</a>
					</div></li>
				<li class="nav-item active"><a class="nav-link disabled"
					href="#"><span class="fa fa-phone"></span>Contact Us</a></li>
				<li class="nav-item active"><a class="nav-link disabled"
					href="#" data-toggle="modal" data-target="#add-post-modal"><span
						class="fa fa-asterisk"></span>Do Post</a></li>

			</ul>
			<ul class="navbar-nav mr-light">
				<li class="nav-item active"><a class="nav-link" href="#!"
					data-toggle="modal" data-target="#profile_modal"><span
						class="fa fa-user-circle"></span><%=user.getName()%> <span
						class="sr-only">(current)</span></a></li>
				<li class="nav-item active"><a class="nav-link"
					href="LogoutServlet"><span class="fa fa-user-plus"></span>Log
						out <span class="sr-only">(current)</span></a></li>

			</ul>
		</div>
	</nav>

		

<!-- end of navbar -->
	
	
	<!-- Main content of body -->
	
	<div class="container">
		
		<div class="row my-1">
			<div class="col-md-8 offset-md-3">
				<div class="card">
					<div class="card-header primary-background text-white">
						<h4 class="post-title"><%=p.getpTitle() %></h4>
					
					
					</div>
					
						<div class="card-body">
						
							<img class="card-img-top" src="blog_pics/<%=p.getpPic() %>" class="card-img-top" alt="...">
							
							<div class="row">
								<div class="col-md-8">
									<p class="post-user-info"><a href="#!">Neeraj Patil </a>has posted : </p>	
								
								</div>
								
								<div class="col-md">
									<p class="post-date"><%= p.getpDate() %> </p>
								
								</div>
								
							</div>
							
							<p class="post-content"><%=p.getpContent() %></p>
							
							<br>
							<br>
							
						<div class="post-code">
							
							<pre><%=p.getpCode() %></pre>
						</div>
						
						</div>
						
							<div class="card-footer primary-background">
							
							
							<%
							LikeDao ld = new LikeDao(ConnectionProvider.getConnection());
							
							
							%>
								<a href="#!" onclick="doLike(<%= user.getId() %>,<%= p.getPid() %>)" class="btn btn-outline-light btn-sm"><i class="fa fa-thumbs-o-up"><span class="like-counter"><%= ld.countLikeOnPost(p.getPid()) %></span></i></a>
			
			
								
			
								<a href="#!" class="btn btn-outline-light btn-sm"><i class="fa fa-commenting-o"><span>20</span></i></a>
							
							
							</div>
							
							<div class="card-footer">
								<div class="fb-comments" data-href="http://localhost:8080/ZTest/show_blog_page.jsp?post_id=<%= p.getPid() %>" data-width="" data-numposts="5"></div>
							
							</div>
						
				</div>
			
			</div>
		
		</div>
	
	
	</div>
	
	
	<!-- end of main content of body -->
	
	
	<!-- profile modal -->


	<!-- Modal -->
	<div class="modal fade" id="profile_modal" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header primary-background text-white text-center">
					<h5 class="modal-title" id="exampleModalLabel">TechBlog</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container text-center">
						<img src="pics\<%=user.getProfile()%>" class="img-fluid"
							style="border-radius: 50%">
						<h5 class="modal-title" id="exampleModalLabel"><%=user.getName()%></h5>

						<!-- details -->

						<div id="profile-details">
							<table class="table">

								<tbody>
									<tr>
										<th scope="row">ID :</th>
										<td><%=user.getId()%></td>

									</tr>
									<tr>
										<th scope="row">Email :</th>
										<td><%=user.getEmail()%></td>

									</tr>

								</tbody>
							</table>
						</div>







						<!-- details -->

					</div>

					<!-- profile edit -->


					<div id="profile-edit" style="display: none;">
						<h3 class="mt-2 text-center">Edit</h3>
						<form action="EditServlet" method="post"
							enctype="multipart/form-data">
							<table class="table">
								<tr>
									<td>ID :</td>
									<td><%=user.getId()%></td>

								</tr>
								<tr>
									<td>Email :</td>
									<td><input type="email" name="user_email"
										value="<%=user.getEmail()%>"></td>

								</tr>
								<tr>
									<td>Name :</td>
									<td><input type="text" name="user_name"
										value="<%=user.getName()%>"></td>

								</tr>
								<tr>
									<td>Password :</td>
									<td><input type="password" name="user_password"
										value="<%=user.getPassword()%>"></td>

								</tr>
								<tr>
									<td>New Profile Pic :</td>
									<td><input type="file" name="image" class="form-control"
										value="<%=user.getProfile()%>"></td>

								</tr>


							</table>

							<div class="container text-center">
								<button type="submit" class="btn-outline-primary ">Save</button>
							</div>

						</form>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Close</button>
					<button id="edit-profile-btn" type="button"
						class="btn btn-primary  ">Edit</button>
				</div>
			</div>
		</div>
	</div>

	<!-- end of profile modal -->


	<!-- add post modal -->


	<!-- Modal -->
	<div class="modal fade" id="add-post-modal" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Provide the
						Post details</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<form id="add-post-form" action="AddPostServlet" method="post">

						<div class="form-group">
							<select class="form-control" name="cid">
								<option selected disabled>--Select Categories--</option>
								<%
									PostDao postd = new PostDao(ConnectionProvider.getConnection());
								ArrayList<Category> list = postd.getAllCategories();
								for (Category c : list) {
								%>

								<option value="<%=c.getCid()%>"><%=c.getName()%></option>

								<%
									}
								%>
							</select>
						</div>


						<div class="form-group">
							<input name="pTitle" type="text" placeholder="Enter post title"
								class=" form-control " />
						</div>

						<div class="form-group">
							<textarea name="pContent" class=" form-control "
								style="height: 200px;" placeholder="Enter post content"></textarea>
						</div>

						<div class="form-group">
							<textarea name="pCode" class=" form-control "
								style="height: 200px;" placeholder="Enter post program(if any)"></textarea>
						</div>

						<div class="form-group">
							<label>Select your pics</label> <br> <input type="file"
								name="pic">

						</div>
						<div class="container text-center">
							<button type="submit" class="btn btn-outline-primary">Post</button>


						</div>

					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- end post modal -->

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="js/myjs.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			let editStatus = false;

			$('#edit-profile-btn').click(function() {
				//                     alert("button clicked")                   //

				if (editStatus == false) {
					$("#profile-details").hide()

					$("#profile-edit").show();
					editStatus = true;
					$(this).text("Back")
				} else {
					$("#profile-details").show()

					$("#profile-edit").hide();
					editStatus = false;
					$(this).text("Edit")
				}

			})

		});
	</script>

	<!-- now post js -->


	<script>
		$(document).ready(function(e) {
			$("#add-post-form")	.on("submit",function(event) {
				//this code getsv called when form is submitted....		
                event.preventDefault();
                console.log("you have clicked on submit");		
				let form = new FormData(this);					


                $.ajax({							
                	url : "AddPostServlet",
					type : 'POST',
					data : form,
					success : function(data,textStatus,jqXHR) {
						//success...
						console	.log(data);
						if (data.trim() == 'done') {	
							swal("Good job!","saved successfully","success")	
						} else {
							swal("Error!","Something went wrong try again...","error")
						}		

					},
	   					error: function(jqXHR,textStatus,errorThrown){

						console.log(jqXHR)
						//error..
						swal("Error!","Something went wrong try again...","error")
								
					   
						
	   	   					},

	   	   					processData:false,
	   	   					contentType:false


			})

		})
		


	
	  })
	
		</script>

	
	
</body>
</html>