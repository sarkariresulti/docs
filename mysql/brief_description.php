===========================================================================================
======================================  Types of Database Language ========================
===========================================================================================


1. Data Definition Language (DDL)
2. Data Manipulation Language (DML)
3. Data Control Language	(DCL)
4. Transaction Control Language  (TCL)


1. Data Definition Language (DDL) :
----------------------------------
It is used to create schema, tables, indexes, constraints, etc. in the database.

Here are some tasks that come under DDL:

Create: 	=> It is used to create objects in the database.
Alter: 		=> It is used to alter the structure of the database.
Drop: 		=> It is used to delete objects from the database.
Truncate: 	=> It is used to remove all records from a table.
Rename: 	=> It is used to rename an object.
Comment: 	=> It is used to comment on the data dictionary.


2. Data Manipulation Language (DML) :
------------------------------------

It is used for accessing and manipulating data in a database. It handles user requests.

Select:         => It is used to retrieve data from a database.
Insert:         => It is used to insert data into a table.
Update:         => It is used to update existing data within a table.
Delete:         => It is used to delete all records from a table.
Merge:          => It performs UPSERT operation, i.e., insert or update operations.
Call:           => It is used to call a structured query language or a Java subprogram.
Explain Plan:   => It has the parameter of explaining data.
Lock Table:     => It controls concurrency.


3. Data Control Language :
--------------------------

DCL stands for Data Control Language. It is used to retrieve the stored or saved data.

Grant:  => It is used to give user access privileges to a database.
Revoke: => It is used to take back permissions from the user.


There are the following operations which have the authorization of Revoke:

CONNECT, INSERT, USAGE, EXECUTE, DELETE, UPDATE and SELECT.


4. Transaction Control Language :
---------------------------------

Here are some tasks that come under TCL:

Commit: It is used to save the transaction on the database.
Rollback: It is used to restore the database to original since the last Commit.