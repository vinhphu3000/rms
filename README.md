# RMS - Resources Management System

Description....

## Installation

1. Clone this project or Download that ZIP file
2. Import database in database/rms.sql
3. Config database information in app/config/database.php
4. Add Vendor (compose install command)
5. Config Virtual host for apache like: 
```
       <VirtualHost *:80>        
            ServerAdmin quangthieuagu@gmail.com
            DocumentRoot "D:/www/rms/public"
            ServerName rms.local
            <Directory "D:/www/rms/public">
                Options Indexes FollowSymLinks MultiViews
                AllowOverride all
                Order Deny,Allow
                Allow from all
                Require all granted
            </Directory>
 	    </VirtualHost>
 
```

## Server Requirements
   Need to make sure your server meets the following requirements:

    * PHP >= 5.6.4
    * OpenSSL PHP Extension
    * PDO PHP Extension
    * Mbstring PHP Extension
    * Tokenizer PHP Extension
    * XML PHP Extension


 