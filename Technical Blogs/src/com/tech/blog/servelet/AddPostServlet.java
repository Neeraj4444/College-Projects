package com.tech.blog.servelet;

import java.io.File;


import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import javax.servlet.http.Part;

import com.tech.blog.dao.PostDao;
import com.tech.blog.entities.Post;
import com.tech.blog.entities.User;
import com.tech.blog.helper.ConnectionProvider;
import com.tech.blog.helper.Helper;

/**
 * Servlet implementation class AddPostServlet
 */
@WebServlet("/AddPostServlet")
@MultipartConfig
public class AddPostServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public AddPostServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
    //C:\\Users\\hp\\Documents\\workspace-spring-tool-suite-4-4.8.0.RELEASE\\ZTest\\WebContent\\blog_pics
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		PrintWriter out = response.getWriter();
		
		int cid = Integer.parseInt(request.getParameter("cid"));
		String pTitle = request.getParameter("pTitle");
		String pContent = request.getParameter("pContent");
		String pCode = request.getParameter("pCode");
		Part part = request.getPart("pic");
		
		//getting current user id which is in session//
		HttpSession session = request.getSession();
		User user = (User)session.getAttribute("currentUser");  //In login servlet//
		
		
		
		//out.println("your post title is " + pTitle);
		//out.println(part.getSubmittedFileName());
		
		 Post p = new Post(pTitle, pContent, pCode, part.getSubmittedFileName(), null,cid, user.getId());
		 
      //we made object of postDao because savePost methos is made in PostDao//
          PostDao dao = new PostDao(ConnectionProvider.getConnection()); 
          
          if(dao.savePost(p))
          {
        	        	  
        	//  @SuppressWarnings("deprecation")
	//		String path = request.getRealPath("/blog_pics ")+File.separator+part.getSubmittedFileName();
        	 
        	String path = "C:\\Users\\hp\\Documents\\workspace-spring-tool-suite-4-4.8.0.RELEASE\\ZTest\\WebContent\\blog_pics"+File.separator+part.getSubmittedFileName();
        	  Helper.saveFile(part.getInputStream(), path);
        	  out.println("done");
        	  
          }else {
        	  out.println("error");
          }
	}

}
