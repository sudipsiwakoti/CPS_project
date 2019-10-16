# Course Planning System

This system provides users, typically university students, with the capability to develop a timetable for their subjects for preparation and the reduction of stress in their university career. As such, the software allows users to login with their associated student identification number and view information about the various existing courses and subjects that include its requirements, prerequisites, antirequisites, availability, description/scope and etc. This information will be derived from the related logic and requirements of the user’s university.

This Laravel web application will provide these features in a manner that is user-friendly and delivers an outstanding user experience.

# Installation and Setup
There are some complications involved when pulling a Laravel repository due to Git configuration issues that disallow the transferring of certain important files locally. 

To initially setup Laravel, follow the steps listed in the following documentation.

https://laravel.com/docs/6.x

It may be of assistance to follow this guide in pulling a Laravel repository.

https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/

# Running the application
Once you are in the directory that stores our course planning system, run:

$ php artisan migrate:fresh --seed

Then, run the program:

$ php artisan serve

Launch your preferred web browser and head to the URL: 

http://127.0.01:8000
