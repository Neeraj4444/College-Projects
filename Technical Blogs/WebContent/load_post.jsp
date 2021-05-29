<%@page import="com.tech.blog.entities.*"%>
<%@page import="com.tech.blog.helper.*"%>
<%@page import="com.tech.blog.dao.*"%>
<%@page import="java.util.*"%>



<!-- In This page we fetch all the posts and the content of this page is shown in profile page post part  -->

<div class="row">
<%


	User uuu = (User)session.getAttribute("currentUser");
	Thread.sleep(1000);
	PostDao d = new PostDao(ConnectionProvider.getConnection());

	int cid = Integer.parseInt(request.getParameter("cid"));
	
	List<Post> posts =null;
	if(cid==0){
		 posts = d.getAllPosts();
	}else{
		posts = d.getPostByCatId(cid);
		
	}
		
	if(posts.size() == 0){
		out.println("<h3 class='display-3 text-center'> No Post in this Category </h3>");
		return;
	}

	
	
	for(Post p: posts)
	{
%>		

<div class="col-md-6 mt-2">
	<div class="card">
	 	<img src="blog_pics/<%=p.getpPic() %>" class="card-img-top" alt="...">
		<div class="card-body">
			<b><%= p.getpTitle() %></b>
			<p><%= p.getpContent() %></p>
		
	
		</div>
		
		<div class="class-footer primary-background text-center">
		
		<%
			LikeDao ld = new LikeDao(ConnectionProvider.getConnection());
							
							
		%>
			
			<a href="#!" onclick="doLike(<%= uuu.getId() %>,<%= p.getPid() %>)"  class="btn btn-outline-light btn-sm"><i class="fa fa-thumbs-o-up"><span class="like-counter"><%= ld.countLikeOnPost(p.getPid()) %></span></i></a>
			
			<!--  To open particular post by clicking on read more of that post we need to get the id of that post -->
			<!-- we are sending post id through URL -->
			<a href="show_blog_page.jsp?post_id=<%= p.getPid() %>" class="btn btn-outline-light btn-sm">Read More...</a>
			
			<a href="#!" class="btn btn-outline-light btn-sm"><i class="fa fa-commenting-o"><span>20</span></i></a>
		
		
		</div>

	</div>
</div>	
	
	
<%	
	}



%>

</div>