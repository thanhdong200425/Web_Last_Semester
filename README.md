# MUSIC APPLICATION MANAGEMENT SYSTEM
## Introduction:
Welcome to the **Music Application Management System**. This project is a web-based application built to **manage and organize music collections, artists, albums, and user interactions.** It provides users with the ability to browse, search, and manage their music library efficiently. The application is developed using **Laravel, Blade, PHP, and MySQL, with XAMPP serving as the local development environment.**

## Table of contents
#### 1. [Project Structure](#project-structure)
#### 2. [Features](#features)
#### 3. [Technologies Used](#technologies-used)
#### 4. [Installation and Setup](#installation-and-setup)
#### 5. [Design Decisions](#desgin-decisions)
#### 6. [Future Enhancements](#future-enhancements)
#### 7. [Conclusion](#conclusion)

#
### Project structure
The project is organized into a typical Laravel structure, with controllers, models, views, and migrations forming the core components. Below is an overview of the main directories and files within the project:

+ **`app/`** - Contains the core application files, including controllers and models.
+ **`resources/views/`** - Contains the Blade templates for the user interface.
+ **`database/migrations/`** - Contains the migration files for database schema.
+ **`routes/web.php`** - Defines the routes for the application.
+ **`public/`** - Hosts publicly accessible files like CSS, JS, and images.
+ **`composer.json`** - Handles the PHP dependencies required for the project.
#
### Features
1. **User Management**: Allows users to register, login, and manage their profiles.

2. **Music Collection Management**: Users can add, edit, and delete songs, albums, and artists.

3. **Responsive Design**: The application is designed to be fully responsive, ensuring it works well on both desktop and mobile devices.

4. **Database Integration**: Utilizes MySQL for data storage, handling all CRUD operations efficiently.

#
### Technologies Used
+ **`Laravel`**: A robust PHP framework that simplifies the development process with its elegant syntax and built-in features.

+ **`Blade`**: Laravel’s templating engine, which helps in building dynamic and reusable views.

+ **`PHP`**: The core programming language used for server-side logic.

+ **`MySQL`**: The relational database used to store all application data.

+ **`XAMPP`**: A local development environment that provides Apache, MySQL, and PHP services.
#
### Installation and Setup

#### Prerequisites
Before setting up and running the Music Application Management System, ensure you have the following prerequisites installed on your local machine:

1. **PHP >= 8.0**: This project is built using Laravel, which requires PHP version 8.0 or higher. You can check your PHP version by running <code>php -v</code> in your terminal.

2. **Composer**: Composer is a dependency manager for PHP. It is required to install and manage the project dependencies. You can download it from [getcomposer.org](https://getcomposer.org/).

3. **MySQL >= 5.7**: The application uses MySQL as the database system. Ensure you have MySQL installed and running. You can check your MySQL version with <code>mysql --version</code>.

4. **XAMPP**: XAMPP is an easy-to-install Apache distribution containing PHP and MySQL. It’s recommended for running the application in a local development environment. You can download it from [apachefriends.org](https://www.apachefriends.org/).

5. **Git**: Git is required to clone the repository and manage version control. You can install Git from [git-scm.com](https://git-scm.com/).

#
To get started with the project locally, follow these steps:
1. **Clone the repository from github of CS50:**

2. **Change directory**
    ``` bash
    cd project
3. **Install dependencies**
    ``` bash
    composer install
4. **Setup environment variables**

    + Change `example.env` into `.env` file
    + Update database credentials in the `.env` file.

5. **Run migrations**
    ``` bash
    php artisan migrate

6. **Run the seeders**
    ``` bash
    php artisan db:seed
7. **Serve the application**
    ``` bash
    php artisan serve

The application should now be running on http://localhost:8000.
#
### Desgin Decisions

#### Database Structure
One of the critical design decisions was the structure of the database. The application follows a relational model, with tables for songs, albums, and artists. Each song is linked to an album, and each album is associated with an artist. This structure was chosen for its simplicity and efficiency in querying related data.

#### Blade Templating
The use of Blade for templating was another important choice. Blade's features like template inheritance, components, and conditionals made it easier to maintain and extend the application's views.

#### Authentication
Laravel’s built-in authentication system was utilized for managing users. This decision was made to leverage Laravel’s secure and well-documented methods for user management, rather than building a custom solution from scratch.

#
### Future Enhancements
+ **Playlist Feature**: Adding the ability for users to create and manage playlists

+ **Social Sharing**: Integrating social media sharing options for users to share their favorite songs or albums.

#
### Conclusion
The Music Application Management System is designed to be a comprehensive solution for managing a music library. By utilizing Laravel and its ecosystem, the project ensures scalability, maintainability, and a rich set of features. This `README.md` aims to provide a thorough understanding of the project’s structure, functionalities, and the rationale behind various design choices. We hope you find this application useful and easy to navigate.
