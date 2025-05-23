git rm -r --cached .
git add *
git update-index --chmod=+x deploy
git commit -m "."
git push