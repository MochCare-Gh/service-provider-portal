<p align="center"><img src="https://mochcare.com/wp-content/uploads/2022/08/mochcare-logo-removebg-preview-300x83.png" width="400"></p>

##  Setting up Git bash 
- Download Git bash from here :[https://git-scm.com/download](https://git-scm.com/download)
- Follow wizard to complete installation

## Pre - Installation Instruction ( Setting up xampp server )
- Download xampp version 7.4.1 from [https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.1/xampp-portable-windows-x64-7.4.1-1-VC15-installer.exe/download](here)
- Follow wizard to complete installation

##  Setting up Laravel 
- Download composer from [https://getcomposer.org/download/](https://getcomposer.org/download/)
- Follow wizard to complete setup


## Cloning project files
- Create a folder under this directory >> C:\xampp\htdocs and name it according to your project

- Clone this repo into your project folder by opening git bash or terminal  in the current directory and typing in : git clone 
```bash
git clone https://github.com/MochCare-Gh/service-provider-portal.git
cd service-provider-portal
```

## Setting up database
- Open Xampp Control Panel from Start menu and start *Apache* and *MySQL* modules by clicking on start button.

- Open [localhost/phpmyadmin] and create a new database.

- Enter your database name (e.g: mochcare)

- Make sure your database is selected, then click on Import 

- Click on Select file to locate "mochcare_service_provider_db.sql" from your project folder. Usually found here >> C:\xampp\htdocs\<project_name>\ <br /> 
Then scroll down and click on Import

- Rename .env.example file to .env inside your project folder and fill in the database information. <br />
(Windows wont show .env, so you have to open git bash or your console in your current directory and run the code below ) <br />
```bash
mv .env.example .env
```
- Open .env file with notepad / vscode and edit by inserting your database details ( Refer to image below )
  Database Host : is IP of your host or it is local server , it is something like [ 127.0.0.1 ] or localhost <br />
  Database name : is Name of created database. ( the database name you used above ) <br />
  Database user name : root ( this is the default username ) <br />
  Database password   : ( leave the password space blank by default ) <br />
- Save the file


## Running the project

Open Git Bash or terminal in your proeject folder and run the following commands to run the project <br />
```bash
composer update
composer install
php artisan key:generate
php artisan serve

```
- Access and log into your project here : http://localhost:8000/admin/login

Default Admin credentials ( You can change later under profile ) <br />
Email: admin@admin.com <br />
Password: password <br />

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
