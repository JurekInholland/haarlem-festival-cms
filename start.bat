

@echo off
docker-compose down
docker-compose up --build -d
echo making sure database is up and running...
TIMEOUT 2
start "" http://localhost:6789