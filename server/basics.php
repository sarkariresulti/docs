unistalled Apache 2
-------------------
sudo apt-get remove apache2*
 

 dpkg --get-selections | grep apache

link: 
 https://www.cyberciti.biz/faq/apt-get-list-packages-are-installed-on-ubuntu-linux/ 



apt-get update 
apt-get upgrade
vim /etc/ssh/sshd_config

##add port 
Port 2256 

##close the editor 

/etc/init.d/ssh restart 

adduser jorge 

vim /etc/ssh/sshd_config    
/etc/init.d/ssh restart

exit

###install c-panel 
------------------ 
su root
curl -O http://vestacp.com/pub/vst-install.sh

 
sudo service apache2 restart 


####remove vesta  cpanel 
