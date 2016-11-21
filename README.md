# shiny-project
PHP app

# Get Started

To keep consistency with all file locations, create a directory in Users/{username}/Sites

git clone this repo into the Sites directory. The result should be Users/{username}/Sites/shiny-project.

Create a directory in /etc/apache2/users/{username}.conf
Inside this directory paste in:

```sh
<Directory "/Users/{username}/Sites/">
AllowOverride All
Options Indexes MultiViews FollowSymLinks
Require all granted
</Directory>
```

Add virtual host by going into /etc/apache2/extra/httpd-vhosts.conf and adding:

```sh
<VirtualHost *:80>
    ServerName shiny.local
    DocumentRoot /Users/{username}/Sites/shiny-project/web/

    <Directory /Users/{username}/Sites/shiny-project/web/>
            Options Indexes FollowSymLinks Includes ExecCGI
            AllowOverride All
            Require all granted
    </Directory>
</VirtualHost>
```

Then go to /etc/apache2/httpd.conf and uncomment:

LoadModule deflate_module libexec/apache2/mod_deflate.so
LoadModule userdir_module libexec/apache2/mod_userdir.so
LoadModule rewrite_module libexec/apache2/mod_rewrite.so
LoadModule php5_module libexec/apache2/libphp5.so
Include /private/etc/apache2/extra/httpd-userdir.conf
Include /private/etc/apache2/extra/httpd-vhosts.conf

In this same file, find:

<IfModule dir_module>
    DirectoryIndex index.html
</IfModule>

and add index.php like so:

<IfModule dir_module>
    DirectoryIndex index.html index.php
</IfModule>

Go to /etc/apache2/extra/httpd-userdir.conf and uncomment:
Include /private/etc/apache2/users/*.conf

Then go to /etc/hosts and add in:

127.0.0.1	shiny.local

LASTLY perform this command:
sudo apachectl restart

Then go to shiny.local/ 
