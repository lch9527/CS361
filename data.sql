-- Company Database from the textbook

create table DEPARTMENT (
  Dname varchar(20) not null,
  Dnumber int(2) not null check (Dnumber > 0 and Dnumber < 41),  
  Mgr_ssn char(9) not null,   
  Mgr_start_date date not null, 
  primary key (Dnumber), 
  unique (Dname)
)ENGINE = INNODB;

create table THEUSER (
  User_name varchar(15) not null,
  Address varchar(30) not null,
  E_mail varchar(30) not null,
  Credit_remain decimal(10,1) not null,
  Credit_pend decimal(10,1) not null,
  Request_id char(9) not null,
  primary key (User_name)
)ENGINE = INNODB;

create table BOOK (
  Bnumber char(9) not null,
  Bname varchar(20) not null,
  Auther varchar(20) not null,
  Credit decimal(10,1) not null, 
  primary key (Bnumber,Credit),
  Owner_name varchar(15) not null,   
  unique (Bname), 
  foreign key (Owner_name) references THEUSER(User_name)
)ENGINE = INNODB; 

create table REQUEST (
  RID char(9) not null,  
  Book_number char(9) not null,
  Requester varchar(15) not null,
  primary key (RID), 
  foreign key (Book_number) references BOOK(Bnumber),
  foreign key (Requester) references THEUSER(User_name)
)ENGINE = INNODB; 

insert into THEUSER values 
 ('John','Domain 1200','1211111@qq.com',73,19,'EEEEEV'),
 ('SDF','7TH 1200','3333333@qq.com',23,10,'AWV');

insert into BOOK values 
 (1,'Bellaire','JK',5,'John'),
 (2,'Sugarland','TY',1,'John'),
 (3,'Houston','SH',9.5,'John');

insert into REQUEST values 
 (1,3,'John'),
 (2,3,'John'),
 (3,1,'John');

insert into WORKS_ON values 
 (123456789,1,32.5),
 (123456789,2,7.5),
 (666884444,3,40.0),
 (453453453,1,20.0),
 (453453453,2,20.0),
 (333445555,2,10.0),
 (333445555,3,10.0),
 (333445555,10,10.0),
 (333445555,20,10.0),
 (999887777,30,30.0),
 (999887777,10,10.0),
 (987987987,10,35.0),
 (987987987,30,5.0),
 (987654321,30,20.0),
 (987654321,20,15.0),
 (888665555,20,null);

insert into DEPENDENT values 
 (333445555,'Alice','F','1986-04-04','Daughter'),
 (333445555,'Theodore','M','1983-10-25','Son'),
 (333445555,'Joy','F','1958-05-03','Spouse'),
 (987654321,'Abner','M','1942-02-28','Spouse'),
 (123456789,'Michael','M','1988-01-04','Son'),
 (123456789,'Alice','F','1988-12-30','Daughter'),
 (123456789,'Elizabeth','F','1967-05-05','Spouse');

insert into DEPT_LOCATIONS values
 (1,'Houston'),
 (4,'Stafford'),
 (5,'Bellaire'),
 (5,'Sugarland'),
 (5,'Houston');

alter table DEPARTMENT 
 add constraint depemp foreign key (Mgr_ssn) references EMPLOYEE(Ssn);

alter table EMPLOYEE   
 add constraint empemp foreign key (Super_ssn) references EMPLOYEE(Ssn);
	