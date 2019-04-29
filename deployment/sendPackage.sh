#!/bin/bash

serverType=$1
versionNum=$2

echo "Creating package for "$serverType" version #: "$versionNum
cd /home/$USER/git/

if [ $serverType == "fe" ] ; then
	tar -cf $serverType'_'$versionNum.tar --exclude-vcs --exclude='IT490Spaghetti/backend' --exclude='IT490Spaghetti/DMZ' IT490Spaghetti
elif [ $serverType == "be" ] ; then
	tar -cf $serverType'_'$versionNum.tar --exclude-vcs IT490Spaghetti/backend
elif [ $serverType == "dmz" ] ; then
	tar -cf $serverType'_'$versionNum.tar --exclude-vcs IT490Spaghetti/DMZ
fi

echo "Package "$serverType'_'$versionNum" was created"

scp $serverType'_'$versionNum.tar adam@192.168.1.20:/home/adam/packages/
