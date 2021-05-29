<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>
<%@page import="java.sql.* ,com.tech.blog.helper.ConnectionProvider"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="../css/mystyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.banner-background {
	clip-path: polygon(30% 0%, 70% 0%, 100% 0, 100% 89%, 64% 99%, 31% 89%, 0 97%, 0 0);
}

.primary-background {
	background: blue;
}
</style>


</head>
<body>
	<%@include file="normal_navbar.jsp"%>
	<!-- //banner -->
	<div class="container-fluid p-0 m-0  ">
		<div
			class="jumbotron  text-white primary-background banner-background ">
			<div class="container">
				<h3 class="display-3">Welcome to Tech Blog</h3>

				<p>Welcome to the Technical blog, world of technology A
					programming language is a formal language comprising a set of
					instructions that produce various kinds of output. Programming
					languages are used in computer programming to implement algorithms.</p>
				<button class="btn btn-outline-light">Start! its Free</button>
				<a href="login_page.jsp" class="btn btn-outline-light"> <span
					class="fa fa-sign-in fa-spin"></span>Log in
				</a>


			</div>

		</div>



	</div>
	<div class="container">
		<div class="row mb-2">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Java Programming</h5>
						<p class="card-text">Java is a powerful general-purpose programming language. It is used to develop desktop and mobile applications, big data processing, embedded systems, and so on. According to Oracle, the company that owns Java, Java runs on 3 billion devices worldwide, which makes Java one of the most popular programming languages.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>



			</div>






			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Python </h5>
						<p class="card-text">Python is a general-purpose coding language—which means that, unlike HTML, CSS, and JavaScript, it can be used for other types of programming and software development besides web development. That includes back end development, software development, data science and writing system scripts among other things.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>



			</div>






			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Data Structure</h5>
						<p class="card-text">Data Structure can be defined as the group of data elements which provides an efficient way of storing and organising data in the computer so that it can be used efficiently. Some examples of Data Structures are arrays, Linked List, Stack, Queue, etc.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>



			</div>



		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">JavaScript</h5>
						<p class="card-text">JavaScript is a text-based programming language used both on the client-side and server-side that allows you to make web pages interactive. Where HTML and CSS are languages that give structure and style to web pages, JavaScript gives web pages interactive elements that engage a user.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>



			</div>






			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Spring Framework</h5>
						<p class="card-text">Spring is the most popular application development framework for enterprise Java. Millions of developers around the world use Spring Framework to create high performing, easily testable, and reusable code. Spring framework is an open source Java platform.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>



			</div>






			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">ReactJS</h5>
						<p class="card-text">React. js is an open-source JavaScript library that is used for building user interfaces specifically for single-page applications. It's used for handling the view layer for web and mobile apps. React also allows us to create reusable UI components.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>



			</div>



		</div>

	</div>








	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="js/myjs.js" type="text/javascript"></script>

</body>
</html>