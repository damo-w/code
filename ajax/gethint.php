<?php
// Fill up array with names
$name=array(
    '李杨','马斌新','陶德胜','王斌','秦兴忠','李俊鹏','陈延东'
);
//get the q parameter from URL
$q=$_GET["q"];
//lookup all hints from array if length of q>0
if ($q >= 0 && $q<=6)
{
$hint=$name[$q];
//for($i=0; $i<count($a); $i++)
// {
// if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
//   {
//   if ($hint=="")
//     {
//     $hint=$a[$i];
//     }
//   else
//     {
//     $hint=$hint." , ".$a[$i];
//     }
//   }
// }
}
//Set output to "no suggestion" if no hint were found
//or to the correct values
if ($hint == "")
{
$response="no suggestion";
}
else
{
$response=$hint;
}
//output the response
echo $response;
?>
