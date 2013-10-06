Use Lamp
========
PHP/JavaScript/MySQL MUD engine
* Author: Thorne Naomi Melcher (Github: ExistentialEnso)
* License: GPL v3
* Version: v0.0.3

The official repository for Use Lamp, a fun and lower-priority passion project of Thorne Melcher, GPLed to allow others
to tinker with the code to make exactly the game they want. The game is designed in a variation on MVC where classes to
handle different in-game commands (which extend the base abstract Command class) fill the role normally occupied by controllers.

Setup
=====
Set your DB info in /core/config.php and load the contents of demo_database_dump.sql to get up and running quickly. The
dump includes a user with the credentials "test@user.com" and "password".

Editing the game requires, at this point, using something like PHPMyAdmin and understanding the data design. This is still
a very early release and lacks any tools to help with setting a game up fully.

Misc
====
Portions of the code from the MIT-licensed (and thus GPL-compatible) Doctrine project (http://www.doctrine-project.org/) in order
to streamline database interactions.