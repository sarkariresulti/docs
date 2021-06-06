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

--

git init 

git status 
git status  -s      //gives information file is modified  or Untracked

Exit :
----
q               ==> press `q` to exit from  log 


Setting Custom code Editor (for git ):
--------------------------------------
git config --global core.editor 'code --wait'   
















