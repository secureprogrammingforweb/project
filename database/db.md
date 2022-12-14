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
machines_db -> machinesname,repo_url,ports, machinedisc
create table auth (machinesname VARCHAR(25), repo_url VARCHAR(25), ports VARCHAR(25), machinedisc VARCHAR(1000));

insert into machines_db values("apache2","ubuntu/apache2","80,443","Apache2 server inside ubuntu server")
insert into machines_db values("jenkins","jenkins/jenkins","80,8080",jenkins Server ")

### Create a database with username, machine running by user, time

### Database VMS running and who runned it
CREATE TABLE `project`.`running_vms` (`username` VARCHAR(100) NOT NULL , `os` VARCHAR(100) NOT NULL , `ip` VARCHAR(100) NOT NULL , `username` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL,`time` VARCHAR(10) NOT NULL ) 

