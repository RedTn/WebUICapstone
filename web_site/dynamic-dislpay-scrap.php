<html>
<head>
<title>home</title>
<LINK href="images/site.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" valign="top">
 <tr>
  <td valign="top"><table width="100%" height="597" border="0" cellpadding="0" cellspacing="0">
    <tr></tr>
    <tr>
      <td colspan="6" bgcolor="#FDFDFD" align="right"><div align="left"><img src="images/top_bg.gif" width="800" height="66"></div></td>
    </tr>
    <tr>
      <td width="800" height="1" colspan="6" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="800" height="1"></td>
    </tr>
    <tr>
      <td width="99%" height="25" bgcolor="#515551"><img src="images/spacer.gif" width="180" height="25"></td>
      <td><a href="index.html" align="right"><img src="images/home.jpg" width="124" height="25" border="0"></a></td>
      <td><a href="static date.html" align="right"><img src="images/static date.jpg" width="124" height="25" border="0"></a></td>
      <td><a href="dynamic date.php" align="right"> <img src="images/dynamic data.jpg" width="124" height="25" border="0"></a></td>
      <td><img src="images/contact.jpg" width="124" height="25" border="0"></td>
      <td><img src="images/resume.jpg" width="124" height="25" border="0"></td>
    </tr>
    <tr>
      <td width="180" height="3" bgcolor="#515551"><img src="images/spacer.gif" width="180" height="3"></td>
      <td width="124" height="3" bgcolor="#FF0000"><img src="images/spacer.gif" width="124" height="3"></td>
      <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
      <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
      <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
      <td width="124" height="3" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="124" height="3"></td>
    </tr>
    <tr>
      <td height="373" valign="top" align="left" background="images/left_bg1.jpg"><table width="100%" height="100%" border="0" cellpadding="20" cellspacing="0" valign="top">
        <tr>
          <body>
<form method = "LINK" Action="/mongo/web_site/dynamic date.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>

<?php
	//COMMENT THIS OUT TO WORK ON NON MONGODB
include('mongo.php');
//include('php-form-select.php');
//*****************************
session_start();
$dataout = $_SESSION['dataout'];
//$value = unserialize($_POST['DataOut']);
//multiarray_print2($value);
//print_r($dataout);

		    	if(array_key_exists ("ToothParam", $dataout)== TRUE || array_key_exists ("SawDimensions", $dataout) == TRUE || array_key_exists ("OperationData", $dataout) == TRUE)
		    	{
				    	if(array_key_exists ("ToothParam", $dataout)== TRUE && $dataout["ToothParam"] != NULL)
				    	{
				    		multiarray_print2($dataout["ToothParam"]);
				    	}
				    	
				    	if(array_key_exists ("SawDimensions", $dataout) == TRUE && $dataout["SawDimensions"] != NULL)
				    	{
				    		multiarray_print2($dataout["SawDimensions"]);
				    	}
				    	
				    	if(array_key_exists ("OperationData", $dataout) == TRUE && $dataout["OperationData"] != NULL)
				    	{
				    		multiarray_print2($dataout["OperationData"]);
				    	}
		    	}
		    	
		    	else
		    	{
		    		multiarray_print2($dataout);
		    	}
				


   function divide_and_c($PrintNew)
   	{
		$returnstring = 'n';
		//echo("$PrintNew in function start <br />");
								preg_match_all( '/[A-Z]/', $PrintNew, $matches);
								//$h = count($matches[0]);
								//print_r($matches[0]);
								//echo("$h");
								if(count($matches[0])<2)
								{									
									return $PrintNew;
									//echo("matches are less than 2 <br />");
								}
								else
								{
									$intername = preg_split('/(?=[A-Z])/', ucfirst($PrintNew));
									
									//echo("$intername[0],$intername[1]");
									//echo("matches are big 2");
									$returnstring = implode(" ", $intername);
									//echo("$returnstring");
									return $returnstring;
								}
								
								
		
	}
?><table class="ieh-fl"><?php 
   function multiarray_print2($dataout)
     {
		 ?><tr><?php
	    $nS = count($dataout);
		$PrintOld = NULL;
		$PrintNew = NULL;
		$PrintNum = NULL;
		$ArrName[0]= NULL;
		$ArrNum[0]= NULL;
		$ArrTime[0] = NULL;
		
		

  				
			
                
    	for($i=0; $i<$nS; $i++)
					{
						
						
						array_push($ArrNum, $i);
						//$p = preg_split("/[\s,]+/", $dataout[$i], -1, PREG_SPLIT_NO_EMPTY);
						$p = explode(";", $dataout[$i]);
						$PrintNew = $PrintOld;
						for($n=0; $n<count($p)-1; $n++)
						{
							$s = explode(":", $p[$n]);
							$PrintNew = divide_and_c($s[0]);
							//echo("$PrintNew in main code <br />");
							
							if(!in_array($PrintNew, $ArrName) )
							{
							
								//echo("Were inside the checking function <br />");
								//$PrintNew = $s[0];
								$PrintNum = $s[1];

									array_push($ArrName, $PrintNew);
									/*for($l=0; $l<count($ArrName); $l++)
									{
										echo("the current values of array is $ArrName[$l] <br />");
									}
									*/
									array_push($ArrNum, $PrintNum);
								
							}
							else 
							{
								$PrintNum = $s[1];
								array_push($ArrNum, $PrintNum);
							}
							 
							//echo("The value of $s[0] at $i is $s[1]<br/>\n");
							
						}
						
						
							
					
					}
					
					?> 

		<div style="height:300px;overflow:auto;">
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
				<style>
                    table,th,td
                    {
                    border:1px solid black;
                    }
                </style>
				<tr>
					<th style="width:10px">Time</th>
				
				
				<?php
							
					$sizeName=count($ArrName);
					for($f=1; $f<$sizeName; $f++)
					{
							?><th style="width:10px"><?php echo("$ArrName[$f]") ?></th><?php
							
							
					}
					?>
                    </tr>
                    <tr><?php
					$maxcolumn = count($ArrName);
					$q = 0;
					for($c = 1; $c<count($ArrNum); $c++)
					{
						If($q==$maxcolumn)
						{
							?></tr><tr><?php
							$q=0;
						}
						$q++;
						
						?><td><?php echo("$ArrNum[$c]") ?></td> <?php
					}
					?></tr>
                   
					</table>
                    </div> 
                    </tr>
					<br><br><br><?php
     }
?></table>
<form method = "LINK" Action="/mongo/web_site/dynamic date.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>
        </tr>
      </table></td>
      <td bgcolor="#FFFFFF" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td width="800" height="3" colspan="6" bgcolor="#515551"><img src="images/spacer.gif" width="800" height="3"></td>
    </tr>
    <tr>
      <td width="800" height="1" colspan="6" bgcolor="#FFFFFF"><img src="images/spacer.gif" width="800" height="1"></td>
    </tr>
    <tr>
      <td width="800" height="8" colspan="6" bgcolor="#A6A6A6"><img src="images/spacer.gif" width="800" height="8"></td>
    </tr>
    <tr>
      <td colspan="6" bgcolor="#FDFDFD" align="right"><img src="images/address.jpg" width="800" height="68"></td>
    </tr>
    <tr>
      <td width="180" height="49" bgcolor="#FFFFFF" align="right"><img src="images/spacer.gif" width="180" height="49"></td>
      <td colspan="5" align="right"><img src="images/rounded_gr_bottom.jpg" width="620" height="49"></td>
    </tr>
  </table></td>
 </tr>
</table>
</body>
</html>