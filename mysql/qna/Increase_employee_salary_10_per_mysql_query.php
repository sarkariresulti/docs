Increase employee salary 10% mysql query :
------------------------------------------

To increase salary of employees in percentage write this sql query.

Example No 1:
-------------
‘UPDATE employees SET salary= salary + (salary * 10 / 100) WHERE salary > 12000’;

Example No 2:
-------------
‘UPDATE employees SET salary= salary + (salary * 10 / 100) WHERE salary between 12000 and 20000’;

