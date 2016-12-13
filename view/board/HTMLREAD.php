<?php
echo <<<HTMLREAD
<div class="readwrap">
  <table class="readtable">
    <tr>
      <td>제목</td>
      <td colspan="2">$title</td>
    </tr>
    <tr>
      <td>작성자</td>
      <td>$writer</td>
      <td>$date</td>
    </tr>
    <tr>
      <td colspan="3">$content</td>
    </tr>
HTMLREAD;
    for ($i=0; $i<count($files); $i++){
      $name = $files[$i]['filename'];
      $no=$_GET['no'];
      echo ("<tr>
        <td colspan='3'>
          <a href='./read.php?no=$no&mode=download'>$name</a>
        </td>
      </tr>");
    }
echo <<<HTMLREAD2
  </table>
</div>
HTMLREAD2;
 ?>
