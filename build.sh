#!/usr/bin/env bash
sudo docker build -t and-web .
sudo docker stop and-web
sudo docker rm and-web
sudo docker run -p 80:80 -p 3306:3306 -d --name="and-web" and-web