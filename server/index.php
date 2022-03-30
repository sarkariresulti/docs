Docs refrences through this video ==> https://www.youtube.com/watch?v=HmYpodx3qkM  

Digital Ocean  login :
----------------------

1. ssh-add digitalocean 
2. chmod 600 digitalocean  // for changing permission ("600" for private ) ("0644" for public )
3. root@<ipaddress> 
4. adduser <username> 	// adding a user  in machine without root permission 
5. usermod -aG <permission> <username>  // for adding  permission to a user 
   Example: usermod -aG sudo silverfoxa 

   	A) For verify "root" command follow this steps 
   		=> enter this command "su -u silverfoxa" 
6. exit   // for logout from the terminal 


##Generating keys : 
-------------------

A) ssh-keygen  // enter command and follow the steps 
B) cat <generatedKeyName>  // 

7. su - <username> 			// for switch to a user we created . 
8. mkdir ~/.ssh 			// for creating ssh directory 
9. chmod 700 ~/.ssh/		// providing permission "Protects a file against any access from other users, while the issuing user still has full access."

10. nano ~/.ssh/authorized_keys   // created new file and added "generated public keys"
11. chomd 600 ~/.ssh/authorized_keys   //Permissions of 600 mean that the owner has full read and write access to the file, while no other user can access the file. 
12. exit 

   A) ssh-add <createdKeyname> ==> adding ssh keys for "created user"
   	 Example: ssh-add silverfoxa 


##For checking Is 'apache2' or 'nginx' install or not 
-----------------------------------------------------
A) apache2 -v   B) nginx -v 


## Assign a user "sudo user" 
----------------------------  
 A) sudo su              ==> means accessing your terminal as a root terminal 



## Installing packages :
------------------------
	A) sudo apt install php-fpm 
	B) sudo apt install npm 
	C) sudo apt install nodejs


live directories:
-----------------
	A) /var/www/
		or 
	B) /home/<username>


 Go one directory back :
 -----------------------
 	cd ../ 


The place where we will add or create our site configuration :
--------------------------------------------------------------
	A) cd /etc/nginx/sites-available/
	B) nano default 


Note: link (nginxconfig.io) for setting nginx setting. 

 
cp default <username>                  // to reach users folder
Example: cp default 'silerfoxa'


Creating symlink : 
-----------------
sudo  ln -s /etc/nginx/sites-available/silverfoxa /etc/nginx/sites-enabled/silverfoxa 
nginx -t  			// for checking is configuration is correct 


unzip -v       						//checking is unzip package is installed or not 
sudo apt install unzip 				// installing unzip package 


mv <which folder you want to movie > <where you want to move>   
Example: mv Scaffold/* . 

service  nginx restart    //restart server 



========================= Connecting github  Project To nginx ====================

	A) Go to the directory where you want to add project data 
	B) git clone https://github.com/SilverFoxa/website2.git 
	     Note: if you want to add in particular directory you have to do this command given below . 
	 	1) git clone https://github.com/SilverFoxa/website2.git <folder_name> 
	 		Example: git clone https://github.com/SilverFoxa/website2.git demo 

rm -rf <folder_name>   		// command for delete directory 


## To create new server config for particular domain 
---------------------------------------------------- 
A) sudo cp silverfoxa demo 					//creating server config for particular folder "demo" 
B) sudo nano demo 							// opening config file 

$ sudo service nginx restrt 				// 

Note: After making changes in git files we can download new changes instructions is given below 

A) git pull origin master 


