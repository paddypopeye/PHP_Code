DOCKERFILE 


If trying to containerize using the included Dockerfile, the following two commands are needed; 

   sudo docker run -p 8000:80 -d -ti xampp tail -f /dev/null
   sudo docker exec /opt/lampp/lampp start

