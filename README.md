PublishPress Checklist Plugin Bootstrap
=======================================

Demo project to show how to extend the checklist add-on adding custom requirements to the checklist.

## First steps

You can easily extend the PublishPress Content Checklist add-on cloning and adapting this project. It is a WordPress plugin designed to work as a base for your own plugin.

* Clone this repository
* Rename the repository using your plugin's name
* Refactor the code replacing "publishpress-checklist-plugin-bootstrap" with your plugin's name, but pay attention to the case of the original terms. If the original is lowercase, keep using lower-case. If the origianl is uppercase, keep using upper-case.
* Rename the main plugin file
* Rename the content of the readme.txt file

## Developing

* Update composer dependencies, running `$ composer update --no-dev`
* Refactor constants using a custom prefix. Replace PUBLISHPRESS_CHECKLIST_BOOTSTRAP with your custom and unique prefix.
* Refactor the code according to the requirement you want to implement.



