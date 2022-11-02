<p align="center"><img src="https://mochcare.com/wp-content/uploads/2022/08/mochcare-logo-removebg-preview-300x83.png" width="400"></p>



## Installation Instruction

- First clone this repo and Upload file to your server .
- Extract file content to server .
- Move all files to your root server folder
  example : public_html folder . [including .htaccess , .env ] it is better to do this by filezilla because some hosts don’t show this files by default .
- Go to your Host and Create new database , you will need  the following in installation   
  Database Host : is IP of your host or it is local server , it is something like [ 127.0.0.1 ] <br />
  Database name : is Name of created database . <br />
  Database user name : Is the Database assigned User name who has full privileges on it  <br />
  Database password   : is the Password of Database User name on this database <br />
  
  Note : Another way to install the DB of application , you can execute attached mochcare_service_provider_db.sql to your database and define database settings in .env   file. If you choose this option, you dont need to continue with the next steps.
  
  
- Go to your website URL EXAMPLE : www.website.com/install 
- Put your database settings and The New User Account which you will Use .
- Go to your www.yourwebsite.com/admin/login to use the application .

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
