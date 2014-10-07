<?php 

$line= $books[0]['Book'];
$this->CSV->addRow(array_keys($line));
 foreach ($books as $book)
 {
       $this->CSV->addRow($line);
 }
 $filename='books';
 echo  $this->CSV->render($filename);
?>