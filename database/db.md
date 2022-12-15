### create database project
use project


### Create a Table with username and password
create table auth (username VARCHAR(25), password VARCHAR(25));


### Create user John with password John123
insert into auth values('john','John123');


### First auth -> returns 1 if True and 0 if false
select * from auth where username="john" and password="John123";

### Craete rbac table with student,contributer,admin assigned to a username

### Create a database with machineNames, repoURL,Ports and discription to be opened
CREATE TABLE `project`. (`key` VARCHAR(100) NOT NULL , `machine_name` VARCHAR(100) NOT NULL , `machine_url` VARCHAR(100) NOT NULL , `machine_disc` VARCHAR(100) NOT NULL , `machine_logo_url` VARCHAR(100) NOT NULL )
ALTER TABLE `machines_db` ADD PRIMARY KEY(`id`);

##### Populate
INSERT INTO `machines_db` (`id`, `machine_name`, `machine_url`, `machine_disc`, `machine_logo_url`) VALUES ('1', 'dvwa', 'vulnerable/dvwa', 'DVWA is a machine1 ', 'https://storage.googleapis.com/attackdefense-public.appspot.com/cve/cve-2020/2405.png'), ('2', 'Apache2', 'apache/apache2', 'Machine2 Disc is apache2', 'https://storage.googleapis.com/attackdefense-public.appspot.com/cve/cve-2020/2405.png');

### Running machines
CREATE TABLE `project`.`running_machines` (`id` INT NOT NULL , `user` VARCHAR(100) NOT NULL , `machine_name` VARCHAR(100) NOT NULL , `time` VARCHAR(100) NOT NULL ,`url` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `running_machines` ADD PRIMARY KEY(`id`);

### Database VMS running and who runned it
CREATE TABLE `project`.`running_vms` (`username` VARCHAR(100) NOT NULL , `os` VARCHAR(100) NOT NULL , `ip` VARCHAR(100) NOT NULL , `username` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL,`time` VARCHAR(10) NOT NULL ) 

### Support tickets
CREATE TABLE `project`.`support` (`id` INT NOT NULL , `user` VARCHAR(100) NOT NULL , `question` VARCHAR(100) NOT NULL , `answer` VARCHAR(100) NOT NULL )
ALTER TABLE `support` ADD PRIMARY KEY(`id`);