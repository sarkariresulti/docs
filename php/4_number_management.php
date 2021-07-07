#Show a number to two decimal places
-------------------------------------

$foo = "105";
echo number_format((float)$foo, 2, '.', '');  // Outputs -> 105.00


echo round(520.34345, 2);   // 520.34
echo round(520.3, 2);       // 520.3
echo round(520, 2);         // 520
