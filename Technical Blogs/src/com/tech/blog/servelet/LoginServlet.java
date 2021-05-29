package com.tech.blog.servelet;

import java.io.IOException;



import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.tech.blog.dao.UserDao;
import com.tech.blog.entities.Message;
import com.tech.blog.entities.User;
import com.tech.blog.helper.ConnectionProvider;


@WebServlet("/LoginServlet")
public class LoginServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
   
    public LoginServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		
		String userEmail=request.getParameter("email");
		String userPassword=request.getParameter("password");
		
		
		UserDao dao=new UserDao(ConnectionProvider.getConnection());
		User u=dao.getUserByEmailAndPassword(userEmail,userPassword);
		if(u==null) {
			
			
			
			Message  msg=new Message("Invalid Details! try again","error","alert_danger");
			response.sendRedirect("login_page.jsp");
			HttpSession s=request.getSession();
			s.setAttribute("msg", msg);
			
		}else {
			HttpSession s=request.getSession();
			s.setAttribute("currentUser",u);
			response.sendRedirect("profile.jsp");
			
			
			
		}
		
		
	}

}
