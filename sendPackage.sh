#!/bin/bash

serverType=$1
versionNum=$2

echo "Creating package for "$serverType" version #: "$versionNum
cd /home/$USER/git/

tar -cf $serverType'_'$versionNum.tar --exclude-vcs IT490Spaghetti

echo "Package "$serverType'_'$versionNum" was created"

scp $serverType'_'$versionNum.tar adam@25.73.116.140:/home/adam/packages/
