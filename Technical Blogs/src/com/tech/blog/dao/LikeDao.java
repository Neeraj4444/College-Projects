package com.tech.blog.dao;
import java.sql.*;
//class to insert and count likes to database
public class LikeDao {
	
	Connection con; //used to store connection  
	
	public LikeDao(Connection con) { //while creating likeDao object pass connection as argument
		super();
		this.con = con;
	}

	public boolean insertLike(int uid,int posid) {
		
		boolean f = false;
		try {
			
			String q = "insert into liked(uid,posid)values(?,?)";
			PreparedStatement p = this.con.prepareStatement(q);
			//values set...
			p.setInt(1, uid);
			p.setInt(2, posid);
			p.executeUpdate(); //since we didnt expect any any data to come so we use execute update
			f = true;
			
			
		}catch(Exception e) {
			e.printStackTrace();
		}
		
		return f;
	}
	
	public int countLikeOnPost(int posid) {
		int count = 0;
	
		String q = "select count(*) from liked where posid=?";
		try {
			PreparedStatement p = this.con.prepareStatement(q);
			p.setInt(1, posid);
			
			ResultSet set = p.executeQuery();//since we expect the result from the database so we use this
			if(set.next()) {
				count = set.getInt("count(*)");
			}
			
		}catch(Exception e) {
			e.printStackTrace();
		}
		
				
		return count;		
		
	}
	
	public boolean isLikedByUser(int uid,int posid) {  //check if same user liked  post twice
		boolean f = false;
		
		try {
			PreparedStatement p = this.con.prepareStatement("select * from liked where uid=? and posid=?");
			p.setInt(1,uid);
			p.setInt(2,posid);
			
			ResultSet set = p.executeQuery();
			
			if(set.next()) {
				f=true;
				
			}
		}catch(Exception e) {
			e.printStackTrace();
		}
		
		return f;
	}
	
	public boolean deleteLike(int uid, int posid) {
		boolean f = false;
		
		try {
			PreparedStatement p = this.con.prepareStatement("delete from liked where uid=? and posid=?");
			p.setInt(1,uid);
			p.setInt(2,posid);
			
		 p.executeUpdate();
		 
		 f=true;
		}catch(Exception e) {
			e.printStackTrace();
		}
		return f;
	}
	
}
