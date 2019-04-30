#!/bin/bash
versionNum=$1
serverType=$2

serverName = `php serverInfo.php $versionNum $serverType servername`
ipAddress = `php serverInfo.php $versionNum $serverType ipAddress`
read versionNeeded

version = `php versionInfo.php $versionNum $serverType $versionNeeded`
cd /home/$USER/packages

mkdir /tmp/data
tar -c /tmp/data/ -xvf $versionNeeded

scp /tmp/data/ $serverName@$ipAddress:/home/$USER/git/


rm -rf /tmp/data
echo "complete"

