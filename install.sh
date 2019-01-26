sudo apt-get update;
sudo apt-get install -y nginx php7.0-fpm;
sudo mkdir /var/www/ssl
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout loginpage.key -out loginpage.crt -config localhost.conf;
sudo cp loginpage.key /var/www/ssl/loginpage.key;
sudo cp loginpage.crt /var/www/ssl/loginpage.crt;
sudo cp roguish /etc/nginx/sites-available/roguish;
sudo ln -s /etc/nginx/sites-available/roguish /etc/nginx/sites-enabled/;
sudo service nginx restart;
sudo cp login.php /var/www/html/login.php;
