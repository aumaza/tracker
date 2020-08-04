#!/bin/bash
echo "# tracker" >> README.md
git init
git add *
git commit -m "Creacion de Esqueleto"
git remote add origin https://github.com/aumaza/tracker.git
git push -u origin master