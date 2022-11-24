<p align="center"><img src="https://mochcare.com/wp-content/uploads/2022/08/mochcare-logo-removebg-preview-300x83.png" width="400"></p>


## Pre - Installation Instruction
- Download xampp latest version from [https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)
- Follow wizard to install setup
- Open Xampp Control Panel from Start menu and start *Apache* and *MySQL* modules by clicking on start button ( Refer to image below )
![image](https://user-images.githubusercontent.com/28471168/203618970-d9816a65-8f4c-4ae9-8efc-9171701f9c71.png)

- Create a folder under this directory >> C:\xampp\htdocs and name it according to your project
![image](https://user-images.githubusercontent.com/28471168/203621626-2a3462a4-b685-456a-8969-fe457cc08429.png)

- Clone this repo into your project folder by opening terminal in the current directory and typing in : git clone https://github.com/MochCare-Gh/service-provider-portal.git
![image](https://user-images.githubusercontent.com/28471168/203719650-5f95d95e-9f18-4771-97bf-a768379f6e63.png)

- Open [localhost/phpmyadmin] and create a new database ( Refer to image below )
<img width="563" alt="image" src="https://user-images.githubusercontent.com/28471168/203618859-99812d8f-385d-4717-b20e-000ee4205bf6.png">

- Enter your database name (e.g: mochcare) ( Keep this in mind to use later )
<img width="570" alt="image" src="https://user-images.githubusercontent.com/28471168/203720453-37e22664-e5a9-40bb-9176-ca465ba2301b.png">

# Database Setup Method 1
- Make sure your database is selected, then click on Import 
<img width="561" alt="image" src="https://user-images.githubusercontent.com/28471168/203734565-119055cd-a036-4f62-b7e5-e1b15032937a.png">

- Click on Select file to locate "mochcare_service_provider_db.sql" under the cloned files, then scroll down and click on Import
<img width="542" alt="image" src="https://user-images.githubusercontent.com/28471168/203742476-d611b2d0-fe78-4ffa-bb30-840914b7c04e.png">

- Locate the .env file in the project directory and open with your editor and put in your database settings.
  Database Host : is IP of your host or it is local server , it is something like [ 127.0.0.1 ] or localhost <br />
  Database name : is Name of created database . <br />
  Database user name : root ( this is the default username ) <br />
  Database password   : ( leave the password space blank by default ) <br />
- Go to your www.yourwebsite.com/admin/login to use the application .

# Database Setup Method 2
Note : Another way to install the DB of application is to go through the installer wizard:  
  
- Go to your website URL EXAMPLE : www.website.com/install 
- Put your database settings and The New User Account which you will Use .
  Database Host : is IP of your host or it is local server , it is something like [ 127.0.0.1 ] or localhost <br />
  Database name : is Name of created database . <br />
  Database user name : Is the Database assigned User name who has full privileges on it  <br />
  Database password   : is the Password of Database User name on this database <br />
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

7. Menu for New Feature has been added.
<img width="484" alt="image" src="https://user-images.githubusercontent.com/28471168/200597684-c35f2bfd-b3d1-45ea-9e6d-3079ec1a9103.png">

8.
<img width="483" alt="image" src="https://user-images.githubusercontent.com/28471168/200595909-9949b48a-eba7-4f39-83d0-db795e0a7311.png">

9.
<img width="502" alt="image" src="https://user-images.githubusercontent.com/28471168/200596239-562d2879-aa61-4f2c-8e66-ee9b10341b72.png">

10.
<img width="505" alt="image" src="https://user-images.githubusercontent.com/28471168/200596846-c8d716c2-0290-4e72-923b-2f073024e3cd.png">

11.
<img width="506" alt="image" src="https://user-images.githubusercontent.com/28471168/200596952-885d2152-24d1-4f5e-9a44-fc889e938b9a.png">

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
