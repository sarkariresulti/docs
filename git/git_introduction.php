=======================
Register on GitKraken
-------------------
name  ==> resultisarkari
email ==> resultisarkari@gmail.com
pd 	  ==> ravi@123456

=======================



git config --global user.name resultisarkari
git config --global user.email resultisarkari@gmail.com

## checking set or not
git config --global user.name 
git config --global user.email 

git init
ls
ls -lart   // show hidden files

git status
git status  -s      //gives information file is modified  or Untracked
git commit  		//for first time using

git add <file name>  	// adding to  staging stage
git add -A  			//adding all staging stage
git add .   			//adding all staging stage

touch about.php   				// create new file
touch testDir/newAbout.php   	// create new file

git commit -m "<Your commit message>"
git commit -a -m "<Your commit message>"   	//skip staging and direct commit 

#remove file form staging area
git rm --cached waste.php
git rm --cached newDir/waste.php

#remove file form current Working area
git rm  waste.php





##Add a file that you missed to add in your last commit
git add filename
git commit --amend 

##Revert repo to a previous commit
git checkout <Your File Name>	// Your last file (undo)
git checkout -f					// Your last file 
git checkout .           		// for all files 
git checkout -  				//Switching back and forth between two branches


##Undo a Git Merge
git revert <SHA>
example : git revert b3c0cb3159b2deea6a15dbe76887a11edf676c94
git revert HEAD
git revert -m 1 <SHA> 			//If you want to specify the exact merge commit SHA== Hash id 

##Delete a Git branch locally and remotely 
git branch — delete <branchname> or git branch --delete --force <branchName>
git push origin — delete <branchname>		//delete a branch remotely 
git checkout -b <branchname>				//creating a new branch

##change a remote branch name you need to first delete the branch and then push the new one
git push origin --delete neam
git push origin name

##Autostash:
Let’s say you are working on a branch and you just find out your colleague has pushed some changes to the same branch, 
but if you are not ready to pull those changes yet, then you have to stash whatever you are working on, then fetch, then 
rebase and then apply for a stash.
You can automate it. What you have do is just enable autostash, which automatically stashes your work and then applies 
the stash after rebase is done. To enable autotash, type this into your terminal -

git config --global rebase.autoStash true


##git reflog : 
Reflog is like a trump card. It is useful when you have messed up to a point that none of the above commands works. 
Reflog shows you a list of all the things you have done in a project so far. Then you can go to any point in the past 
and fix the problem. So,

git reflog


##Change branch name: 
git branch -m neam name			//	where “neam” is the wrongly typed name, “name” is the new name of the branch.

##open file in vi editor
vi about.php

##exit from vi editor 
 ESC + :q!

==========================
config --global core.pager cat)


Unstaging a Staged File
------------------------
git reset HEAD CONTRIBUTING.md

		or 
		
$ git restore --staged CONTRIBUTING.md

 git restore --staged file_7.php
				
Unmodifying a Modified File :
----------------------------
$ git checkout -- CONTRIBUTING.md


Merging into `master` branch :
------------------------------
git branch branchNo1  						// create new branch
git branch									// list all branch 
git checkoout branchNo1						// shifting into branch `branchNo1`
git merge branchNo1							// `branchNo1` branch added into `master` branch
git checkoout -b branchNo1					// `branchNo1` branch created and also shifted into `branchNo1` branch


## Generating ssh key 
---------------------
$ ssh-keygen -t ed25519 -C "your_email@example.com"
Example: ssh-keygen -t ed25519 -C "resultisarkari@gmail"
				or 
				
$ ssh-keygen -t rsa -b 4096 -C "resultisarkari@gmail"
$ eval $(ssh-agent -s)					//start the ssh-agent in the background
[
	 open ~/.ssh/config     //for checking it is exist or not 
     touch ~/.ssh/config    // if the file doesn't exist create file 
	 
	 Host * 								    //Open your ~/.ssh/congig file , then modify the file, replacing 	
			AddKeysToAgent yes					//  ~/.ssh/id_ed25519 if you are not using the default location
			UseKeychain yes 					//  and name for your id_ed25519 key. 
			IdentityFile ~/.ssh/id_ed255519 
]

ssh-add ~/.ssh/id_rsa
$ cat ~/.ssh/id_rsa.pub

##checking ssh connection 
--------------------------
ssh -T git@github.com 					// If it will return my username then it is working good 

user = sarkariresulti
pd== XYZ@12345678910a

## uploading on git hub :
-------------------------
git remote add origin git@github.com:sarkariresulti/demo.git
git push -u origin master
git push --force origin master     //sometime forcefully added 

git remote set-url origin https://github.com/sarkariresulti/docs.git

git remote   			//list remote
git remote -v  			//list remote origin

Clear :
-------
git config --global --unset-all

git config --global --unset user.name
git config --global --unset user.email
git config --global --unset credential.helper


.gitignore
==========
/mylog.log 				//ignore `mylog.log` on root folder
mylog.log				// ignore `mylog.log` on anywhere
*.log					// ignore any log
newfolder/				// ignore `newFolder` directory


#Reset
=======
git reset --<mode> <commit id>

mode ==> soft, mixed , hard , --merge , hard , keep
	
#cherry 
=======
git cherry-pick <commiti d>
	
#1 Remove non empty directory
rm -rf dirname


















 






































        



