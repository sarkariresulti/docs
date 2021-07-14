
Remove index key :
-----------------

 ALTER TABLE tbl_quiz_attempt_master
  DROP INDEX index_name;

2) ALTER TABLE tbl_quiz_attempt_master
  DROP INDEX `PRIMARY`; 

Set not null to null :
----------------------
ALTER TABLE users MODIFY phone_number VARCHAR(255);



ALTER TABLE `users` ADD UNIQUE(`phone_number`);
    Or 
ALTER TABLE Persons ADD CONSTRAINT UC_Person UNIQUE (ID,LastName);



 ALTER TABLE users DROP INDEX UC_Person;
 ALTER TABLE `users` ADD CONSTRAINT UC_Person UNIQUE(`phone_number`);


