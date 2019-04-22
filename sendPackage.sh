#!/bin/bash

serverType=$1
versionNum=$2

echo "Creating package for "$serverType" version #: "$versionNum
cd /home/$USER/git/

if [$serverType == "fe"]
	tar -cf $serverType'_'$versionNum.tar --exclude-vcs IT490Spaghetti --exclude='IT490Spaghetti/backend' --exclude='IT490Spaghetti/DMZ'
elif [$serverType == "be"]
	tar -cf $serverType'_'$versionNum.tar --exclude-vcs IT490Spaghetti/backend
elif [$serverType == "dmz"]
	tar -cf $serverType'_'$versionNum.tar --exclude-vcs IT490Spaghetti/DMZ


echo "Package "$serverType'_'$versionNum" was created"

scp $serverType'_'$versionNum.tar adam@25.73.116.140:/home/adam/packages/
