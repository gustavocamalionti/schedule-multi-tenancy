# swift-schedule-multi-tenancy
 
https://laravel.com/docs/11.x
https://laravel.com/docs/11.x/starter-kits#breeze-and-blade
https://tenancyforlaravel.com/docs/v3/quickstart/
https://www.mysql.com/
https://www.nginx.com/
https://laragon.org/index.html (botao-direito-tela/nginx/sites-enabled/00-default.conf)
    - em root, altere:
        root "C:/Users/Gustavo/Documents/programacao/projeto/source/public";

    - também em location:
         location / {
            try_files $uri $uri/ /index.php$is_args$args;
		    autoindex on;
        }