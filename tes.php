<?php
function triangle($n,$i=0)
{
  if($n == 0)
      return 0;
  for($j=0;$j<$n;$j++)
      echo "&nbsp;";
  for($j=0;$j< (2*$i) + 1;$j++)
      echo "*";
  echo "<br>";
  triangle($n - 1,$i + 1);
}

triangle(10);
?>