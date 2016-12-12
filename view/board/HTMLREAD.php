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
  </table>
</div>
HTMLREAD;
 ?>
