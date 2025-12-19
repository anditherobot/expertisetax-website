
# WebinolySSLredirectStart - HTTP to HTTPS Redirect
server {
	listen 80;
	listen [::]:80;
	server_name expertisetax.com www.expertisetax.com;
	return 301 https://$host$request_uri;
}
# WebinolySSLredirectEnd
# WebinolyNginxServerStart
server {
	listen 443 ssl;
	listen [::]:443 ssl;
	listen [::]:443 quic;
	listen 443 quic;

	server_name expertisetax.com www.expertisetax.com;

	# WebinolySSLstart
	ssl_certificate /etc/letsencrypt/live/expertisetax.com/fullchain.pem;
	ssl_certificate_key /etc/letsencrypt/live/expertisetax.com/privkey.pem;
	ssl_stapling on;
	ssl_stapling_verify on;
	ssl_trusted_certificate /etc/letsencrypt/live/expertisetax.com/chain.pem;
	# WebinolySSLend	
	access_log off;
	error_log /var/log/nginx/expertisetax.com.error.log;
	
	root /var/www/expertisetax.com/htdocs;
		
	index index.php index.html index.htm;
	
	include common/auth.conf;
	
	# WebinolyCustom
	# WebinolyCustomEnd
	
	include common/phpx.conf;
	include common/locations.conf;
	include common/headers.conf;
	include /var/www/expertisetax.com/*-nginx.conf;
	include /etc/nginx/conf.d/*.conf.srv;
}
# WebinolyNginxServerEnd
