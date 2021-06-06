==> `GIT Kraken` GUI of git .(https://www.gitkraken.com/)


Command :
--------

open .     // opening current folder (for mac )
start .    //  opening current folder (for windows )

ls              // list file
ls  -a          //  show hidden files 
ls wordpress    // ye current directoty ke `wordpress` folder ko open kar dega 

pwd             // return current directory location 

touch red.txt orange.txt yellow.txt   // for generating 3 files in single line command 
touch Pets/horses/rocky.png             // for generating `rocky.png` file inside horses folder 

mkdir Plants                // generating folder `Plants`
mkdir Plants  Animals              // generating folder `Plants` and  `animals`

rm rocky.txt      // delete `rocky.txt` file 
rm t1.tx t2.tx    // remove both files 
rm -rf             // remove `directory`



git  log  
git log --abbrev-commit     // small size hash 
git log --oneline           // only return `hash key` and `commit messages` 



git init 

git status 
git status  -s      //gives information file is modified  or Untracked

Exit :
----
q               ==> press `q` to exit from  log 


Setting Custom code Editor (for git ):
--------------------------------------
git config --global core.editor 'code --wait'   

commit :
------- 
git commit 
git commit -m "<Your commit message>"
git commit -a -m "<Your commit message>"   	//skip staging and direct commit 

##Add a file that you missed to add in your last commit
git add filename
git commit --amend 


.gitignore
==========
/mylog.log 				//ignore `mylog.log` on root folder
mylog.log				// ignore `mylog.log` on anywhere
*.log					// ignore any log
newfolder/				// ignore `newFolder` directory


Merging into `master` branch :
------------------------------
git branch branchNo1  						// create new branch
git branch									// list all branch 
git checkoout branchNo1						// shifting into branch `branchNo1`
git merge branchNo1							// `branchNo1` branch added into `master` branch
git checkoout -b branchNo1					// `branchNo1` branch created and also shifted into `branchNo1` branch
 
                   or 

git branch branch_1  						// create new branch  
git switch branch_1                         // shifting into branch `branch_1`
git switch -c branch_2                      // creating `branch_2` and shifting to `branch_2`
git branch -D branch_1                      // Delete `branch_1` (before deleting switch to `master`)
git branch -m branch_3                     // Rename `branch_1` to `branch_3` (before Renaming  switch to that branch)
git merge branchNo1							// `branchNo1` branch added into `master` branch (Before merge into `master` we need to switch `master`)


merge commit :
--------------




git diff : 
---------

git diff            //(it compare two current file and staging file)
git diff HEAD       // It compares from last commit (both stage and unstage)
git diff --staged   //  Diffrence between staging area and last commit 
git diff --cached   // Diffrence between staging area and last commit 

git diff HEAD HEAD~1    //the parent commmit of HEAD (new commit to parent commit )
git diff  HEAD~1        //(parent commit to child )


git diff style/style.css     //compare particular file 
git diff HEAD style/style.css     //compare particular file 

git diff HEAD style/style.css  index.php    //two file compare particular file 

Syntax : git diff branch1..branch2 
git diff master..odd-numbers   // comparing from two branches (current branch is `master` second branch is `odd` and file is `numbers.txt`)

==> comparing using hash (coomit) :
git log --online 
git diff <hash1>..<hash2>


Stashing :
----------
Note: When we work in multipal branches sometime we forget to commit, the consequense of this is 
 when we  swith to master branch all changes of previous branch comes with.


`git stash `  or `git stash save`    // (Before Switching The Branch) 
 git stash  pop                     //   (After coming from another branch ) it returns every changes made by us 

 git stash apply         // same works like `pop` only diffrence it can apply on multipal branches 

===> Note : When we do multipal time stash in file (It creates a list of stash then apply a stash from list )

git stash list              // listin stash 
git stash apply stash@{2}   // apply particular stash 

==> Clear stash   

git stash drop stash@{0}        // clear particular stash using id 
git stash clear                 // clear all stash 


================================================ Undoing Changes ================================

git checkout <commit-hash>          // first 7 character 

Referencing Commits Relative to HEAD :
-------------------------------------
git checkout HEAD~1         //goto parent head 
git checkout HEAD~2         //got grand parent head 
git checkout HEAD~3         //3rd parent head 





