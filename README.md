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

## How to contribute ( NO-CODE ) *For general users and developers
 
1.
<img width="534" alt="image" src="https://user-images.githubusercontent.com/28471168/200583099-3afaf25d-6edb-435e-8b38-d3ea727bed93.png">

2.
<img width="534" alt="image" src="https://user-images.githubusercontent.com/28471168/200583644-328ab4de-32df-42ad-be0b-8ee8627c4a70.png">

3. Enter your new feature name and select icon here.
<img width="536" alt="image" src="https://user-images.githubusercontent.com/28471168/200583835-132a54c6-457f-470c-9ea7-08524001a2c5.png">

4.
<img width="551" alt="image" src="https://user-images.githubusercontent.com/28471168/200584133-6c3a93a6-8653-49df-b1fb-740fb469a3ad.png">

5.
<img width="537" alt="image" src="https://user-images.githubusercontent.com/28471168/200584305-105e2c14-defa-49d6-95f0-5c233948af80.png">

6.
<img width="537" alt="image" src="https://user-images.githubusercontent.com/28471168/200584475-abdef73b-356d-45f0-90aa-674cc91c3e36.png">



 
All CRUD Modules listed

               

Enter your new feature name and select icon here.
 
Locate “New Feature” and click Configure
Note: “Fields” represents “column” in database
   
 
Click on “Add New Field” and fill in the details requested. 
 
Click on “Generate Module” after completing configuration iguration

CRUD for New Feature has been added.
 
PHP source files for New Feature can be found here >> root/resources/views
 
You can make changes as you wish in this file. (Knowledge of PHP required )








 
API Menu created on sidebar.

 
Scroll down to view API documentation for New Feature


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
