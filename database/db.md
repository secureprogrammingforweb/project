### create database project
use project


### Create a Table with username and password
create table auth (username VARCHAR(25), password VARCHAR(25));


### Create user John with password John123
insert into auth values('john','John123');


### First auth -> returns 1 if True and 0 if false
select * from auth where username="john" and password="John123";
