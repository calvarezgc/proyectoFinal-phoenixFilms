<?php
/* function limpiarVar($cadena)
{
  return trim(addslashes(htmlentities($cadena)));
} 
 */
function limpiarVar($cadena)
{
  $result = trim($cadena);
  $result = addslashes($cadena);
  $result = htmlspecialchars($cadena);
  return $result;
}
