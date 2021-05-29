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

import com.tech.blog.dao.UserDao;
import com.tech.blog.entities.Message;
import com.tech.blog.entities.User;
import com.tech.blog.helper.ConnectionProvider;
import com.tech.blog.helper.Helper;


@WebServlet("/EditServlet")
@MultipartConfig
public class EditServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    
    public EditServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		PrintWriter out=response.getWriter();
		//fetch all data//
		String userEmail=request.getParameter("user_email");
		String userName=request.getParameter("user_name");
		String userPassword=request.getParameter("user_password");
		
		Part part=request.getPart("image");
		String imageName=part.getSubmittedFileName();
		
		//get the user from the session//
		HttpSession s=request.getSession();
		User user=(User)s.getAttribute("currentUser");
		user.setEmail(userEmail);
		user.setName(userName);
		user.setPassword(userPassword);
		
		if(imageName == null) {
			out.println("not updated");
			Message  msg=new Message("Image missing! try again","error","alert_danger");
			s.setAttribute("msg", msg);
			response.sendRedirect("profile.jsp");
		} else {
			user.setProfile(imageName);	
		}
		
		
		//update this data in database//
		UserDao userDao=new UserDao(ConnectionProvider.getConnection());
		boolean ans = userDao.updateUser(user);
		if(ans)
		{
			
			out.println("updated to db");
			//@SuppressWarnings("deprecation")
			//String path = request.getRealPath("/pics")+File.separator+user.getProfile();
			//getRealPath method brings you to WebContent/pics/user.getProfile()//
			
			String path = "C:\\Users\\hp\\Documents\\workspace-spring-tool-suite-4-4.8.0.RELEASE\\ZTest\\WebContent\\pics"+File.separator+user.getProfile();
			
			Helper.deleteFile(path);
				if(Helper.saveFile(part.getInputStream(), path)) {
					out.println("Profile updated..");
					
					Message  msg=new Message("Profile updated..","success","alert_success");
					
					
					s.setAttribute("msg", msg);
				
				}else {
					/////
					
				}
			
		}
		else {
			out.println("not updated");
			Message  msg=new Message("something went wrong! try again","error","alert_danger");
			
			
			s.setAttribute("msg", msg);
		}
		response.sendRedirect("profile.jsp");
		
	}

}
