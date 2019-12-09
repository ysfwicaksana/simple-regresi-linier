<?php

function preventInjection($value)
{
   $filter = stripslashes(strip_tags(htmlspecialchars($value,ENT_QUOTES)));

   return $filter;
}
