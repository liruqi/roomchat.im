pandoc -f markdown_github -t mediawiki -o l.mediawiki List-of-languages-that-compile-to-JS.md
cat l.mediawiki | awk -F"|" '{if (substr($1,0,6) ==  "[[File") print substr($1,8); else print $0; }' > List-of-languages-that-compile-to-JS.mediawiki
sed -i .back -e 's/\.svg\?style=flat-square/\.png/g' List-of-languages-that-compile-to-JS.mediawiki
rm l.mediawiki l1.mediawiki.back
