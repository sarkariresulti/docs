
//# for count month and year :
-----------------------------
select  date_format(str_to_date(created,'%Y-%m-%d %h:%i:%s'),'%Y-%m-%d %h:%i:%s') from wp_students;
select DISTINCT month(date_format(str_to_date(created,'%Y-%m-%d %h:%i:%s'),'%Y-%m-%d %h:%i:%s')) as month  from wp_students;

//#filter query :
---------------- 
SELECT * FROM wp_students WHERE `created` > str_to_date('2021-07-06 10:50:02','%Y-%m-%d %h:%i:%s');
