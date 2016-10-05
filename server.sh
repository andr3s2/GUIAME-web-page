#!/usr/bin/env bash

docker stop guiame && docker rm guiame
docker run -p 8888:80 --name guiame -v /Users/afpinedac/projects/guiame/src:/var/www/html -d guiame 
