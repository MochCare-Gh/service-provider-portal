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

## How to customize / contribute ( NO-CODE ) *For general users and developers
 
1. SELECT CRUD Builder from the left Side bar >> Modules

2. All CRUD Modules are listed here. Click on “Add New Module” to add a new feature.

3. Enter your new feature name and select icon here.

4. Locate “New Feature” and click Configure
Note: “Fields” represents “column” in database
   
5. Click on “Add New Field” and fill in the details requested. 

6. Click on “Generate Module” after completing configuration

7. Menu for New Feature has been added.

# For developers ( Knowledge of Php , Laravel , Javascript is required )
8. PHP source files for New Feature can be found here >> project_folder/resources/views

9. You can make changes as you wish in this file.

# API documentation and management
10. Api documentation is available on your dashboard. <br />
Locate API Menu created on sidebar.<br />
Scroll down to view API documentation all modules. <br />
Methods documented ["POST"] , ["GET","HEAD"]

## Built With
1.	Laravel Framework 
2.	Angular JS .
3.	Gentelella Admin Template .
4.	Bootstrap.
5.	Font Awesome.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
