# docker-boilerplate

This is a quick setup for containerising your project. It helps your install Mysql 5.7.22, phpmyadmin.

What You should do

1. If you would use Mysql, update the Mysql Configuration;
   MYSQL_DATABASE: your_db
   MYSQL_USER: your_username
   MYSQL_PASSWORD: your_password
   MYSQL_ROOT_PASSWORD: your_root_password

2. Change the service_name and the service_name_queue to your preferred name in the docker-compose.yaml file;
3. Create your service helper class inside the services folder if it does not exist
4. Run your migrations

    Cheers
