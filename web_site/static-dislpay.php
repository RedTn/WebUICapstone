<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>PHP form select box</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Style-Type" content="text/css; charset=utf-8">
	<meta http-equiv="Content-Script-Type" content="text/javascript; charset=utf-8">
<!-- define some style elements-->
		<style type="text/css">
			table { display: inline-block; vertical-align: top; border: 1px solid; }
		</style>
		<!--[if lte IE 7]>
			<style>
				table.ieh-fl { float: left; }
			</style>
		<![endif]-->
<style>
label,a 
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 14px; 
}

</style>	
</head>

<body>
<img src="images/top_bg.gif" alt="the logo strip" width="800" height="66">
<form method = "LINK" Action="/mongo/web_site/static date.php">
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
//This statemet Checks if any of the structures are present, to ensure it does not perform an empty task. To add extra structures, simply add another OR statemt following the format, with the name of your new structure.
//Following that, add an IF statemt, following the format in this block, to add it to the display case. 
		    	if(array_key_exists ("ManualControls", $dataout)== TRUE || array_key_exists ("CurrentState", $dataout) == TRUE)
		    	{
						//Checks if this particual strucutre exists within the returned stream of data
				    	if(array_key_exists ("ManualControls", $dataout)== TRUE && $dataout["ManualControls"] != NULL)
				    	{
							//If it does, it sends it to the fucntion that prints the section.
				    		multiarray_print2($dataout["ManualControls"], "ManualControls");
				    	}
				    	
				    	if(array_key_exists ("CurrentState", $dataout) == TRUE && $dataout["CurrentState"] != NULL)
				    	{
				    		multiarray_print2($dataout["CurrentState"], "CurrentState");
				    	}
				    	
		    	}
		    	
		    	else
		    	{
					//If none of the strucutres listed are present, the function will pring whatever is in the datastream.
		    		//multiarray_print2($dataout);
					echo("The database does not contain any data for the structures selected!");
		    	}
				

	//This funciton takes and automates the nameing process, if your component name is ToothParam for example, it will turn it into Tooth Param, therefore when printing the estetics are nicer, and more understandable. 
	//Requirement for this funciton to work, each new work should begin with a capital letter, and no special charachers or underscores should be used in it. UNless you would like to print them as well. 
   function divide_and_c($PrintNew)
   	{
		$returnstring = 'n';
		//echo("$PrintNew in function start <br />");
								//Here we look or capital letters in the string, and store the resulting count in $matches variable.
								preg_match_all( '/[A-Z]/', $PrintNew, $matches);
								//$h = count($matches[0]);
								//print_r($matches[0]);
								//echo("$h");
								//If the first element of the $matches array is less than 2, that means the string consists of one word, and the function simply returns that string, as its job is done. 
								if(count($matches[0])<2)
								{									
									return $PrintNew;
									//echo("matches are less than 2 <br />");
								}
								//If not, the function will traverse the string, and break it apart using capital letters as delimiters, the recombining the string back togetehr with a space inbetween, using the implode funciton. 
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
	// Here we begin building a table for a single structure, fro example Tooth Parameter
?><table class="ieh-fl"><?php 
//This function obtian the date/time information from the unique ID stored in the databse, and returs it.
 function getDateTimeFromMongoId(MongoId $mongoId)
{
    $dateTime = new DateTime('@'.$mongoId->getTimestamp());
    $dateTime->setTimezone(new DateTimeZone(date_default_timezone_get()));
    return $dateTime;
}
//This funciton will return an array of time and values corresponding to one parameter, for example HookAngle
function GetMeTime($input,$component) 
{
 include('mongo.php');
 $backvar = array();
 $ArrTime = array();
 $input = $input;
 $teeth = $db->$input;  //this is where you change to different Structures, you want Operationdata? , $input = "OperationData"; MAKE SURE you have data of it in the database
 $cursor = $teeth->find();  //find() can be replaced with many things, http://www.php.net/manual/en/mongocollection.find.php ,  functions are all on left
 foreach($cursor as $doc) {
	 //var_dump($doc);
	 //$hookangle1 = $doc{};
 	$id = array_shift($doc);  //Pops the FIRST element off array, comment this out to see what array looks like without it
 	$output = getDateTimeFromMongoId($id);
	$format = date_format($output, 'd-m-Y H:i:s');	//2 timestamp formats for you to try, completely adjustible
	//$format = date_format($output, 'g:ia \o\n l jS F Y');
	//ElInQuestion is the component for which the data is being retrieved, for example HookAngle. 
	$ElInQuestion = $doc[$component];
	//An intermediate value to store the data for this particular iteration. 
 	array_push($backvar, $format . "**" . $ElInQuestion);
	//$ArrTimeIntermediate = $format . "**" . $ElInQuestion;
	//$ArrTime[] = $ArrTimeIntermediate;
	//return $ArrTime; 
	//break; 	
 }
 return $backvar;
}

//This function takes the data from the time/data array stoed in the NumArray, and splits it into the time and value components. 
//For example 27-11-2013 01:22:04**59.330 will become an array of two components{[0]=>27-11-2013 01:22:04 [1]=>59.330} 
function StarOut($dirty)
{
$NewVal = explode("**", $dirty);
return $NewVal;
}
function BackTogether($separate)
{
	$s1 = $separate; 
	$s2 = explode(" ",$s1);
	$s3 = implode($s2);
	return $s3;
	
}
function MakingTitles($together) 
{
	//here we will determine what the name should look like in proper typing, and set the return variable to that value. 
	//to add another structure, simply add another test case, along with the proper name you would like displayed. 
	$DisplayName;
	if($together == "CurrentState")
	{
		$DisplayName = "Current State";	
	}
	
	if($together == "ManualControls")
	{
		$DisplayName = "Manual Controls";	
	}
	
	return $DisplayName;
}

   function multiarray_print2($dataout, $BigName)
     {
		 $ShowName = MakingTitles($BigName);
		 ?><br/><b><font size="6"><?php echo("$ShowName: Table of Requested Values and Titles");?></font></b><br/><br/><?php
		 //Creates a new row
		 ?><tr><?php
		//declare the variables used, PrintOld, PrintNew are used to cpmapre values that have been retrieved or printed. 
		//nS is used to go through all the elemets of the data received by the funciton. 
		// ArrName and ArrNum are arrays that hold the component names and values to be printed respectively. 
		//ArrTime contains the time or timestamps.
		$StructName = $BigName;  
	    $nS = count($dataout);
		$PrintOld = NULL;
		$PrintNew = NULL;
		$PrintNum = NULL;
		$ArrName[0]= NULL;
		$ArrNum[0]= NULL;
		$ArrTime[0] = NULL;
		
		

  				
			
        // This loop will be performed for every element of the data received.      
    	for($i=0; $i<$nS; $i++)
					{
						
						//Here we push the current integer, (teh counter), this will later be replaced by the timestamp. 
						array_push($ArrNum, $i);
						//$p = preg_split("/[\s,]+/", $dataout[$i], -1, PREG_SPLIT_NO_EMPTY);
						//We take the element in question which looks like this: HookAngle: 1; TopAngle: 50.5; TangentialAngle: 60.5; 
						//And break it into sub components, therefore we now have an array that loos something like this:
						//{[0]=>HookAngle: 1 [1]=> TopAngle: 50.5 [2]=> TangentialAngle: 60.5}  
						$p = explode(";", $dataout[$i]);
						//here the new component becomes the old, processed one, as we move on.
						$PrintNew = $PrintOld;
						//NOw we process each of the elemts of the new array
						for($n=0; $n<count($p)-1; $n++)
						{
							//We take each component, and separate it into its name and value. This process will be repeated for all components. 
							$s = explode(":", $p[$n]);
							//The Newly extracted name gets sent to the separation function rpeviously written, and stored in the PrintNew variable. 
							$PrintNew = divide_and_c($s[0]);
							//echo("$PrintNew in main code <br />");
							
							//Here we decide whetehr or not to store the newly aquired name. 
							//Because in the raw data array, this name repeats for every subset of the array, we check whether we already stored it in our printing array ArrName.  
							if(!in_array($PrintNew, $ArrName) )
							{
							
								//echo("Were inside the checking function <br />");
								//$PrintNew = $s[0];
									//We assign the second component of the newly broken array, which is a value at that time, to PrintNum. 
									$PrintNum = $s[1];
									//In this case scenario the name was not present in the name printing array, so we added it. 
									array_push($ArrName, $PrintNew);
									/*for($l=0; $l<count($ArrName); $l++)
									{
										echo("the current values of array is $ArrName[$l] <br />");
									}
									*/
									//We then add the value of that component to the value printing array ArrNum. 
									array_push($ArrNum, $PrintNum);
								
							}
							else 
							{
								//In this case scenario the  value was laready present, so we do not include it into the array again, and just add the value to the number printing aray. 
								$PrintNum = $s[1];
								array_push($ArrNum, $PrintNum);
							}
							 
							//echo("The value of $s[0] at $i is $s[1]<br/>\n");
							
						}
						
						
							
					
					}
					
					?> 

  <div style="height:400px;overflow:auto;">
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
				<style>
                    table,th,td
                    {
                    border:1px solid black;
                    }
                </style>
				<tr>
					<?php
                    //<th BGCOLOR="#ffff00" style="width:10px">Time</th>
					?>
				
				<?php
							
					$sizeName=count($ArrName);
					$sizeNum = count($ArrNum);
					$NumOfRows = ($sizeNum/($sizeName +1));
					$ArrayOfNamesAndValues = array();
					//$filtered = array();
					for($f=1; $f<$sizeName; $f++)
					{
						//An intermediate array to hold the vbalues retrieved from the GetMeTime function
						//It will hold a single array of timestamps and values associated with those times
						//according to the value given, for example HookAngle.
						//This loop will traverse thorugh all the names. 
						//The following commented out section was used for debugging, it was left in, incase you would like to debug this code upon exapnsion in the future. 
						/*
						
						echo("inside the main array making funciton");
						?><br><?php
						echo "the size of name array is $sizeName";
						?><br><?php
						echo "f at this point is: $f";
						?><br><?php
						$requesting = BackTogether($ArrName[$f]);
						echo "The structure requested is: ";
						echo "$requesting";
						?><br><?php
						$InterArrayHold = GetMeTime($StructName,$requesting);
						echo "here is the intermediate array of one component:"
						?><br><?php
						var_dump($InterArrayHold);
						?><br><?php
						$ArrayOfNamesAndValues[$requesting] = $InterArrayHold;
						echo "here is the full array";
						?><br><?php
						var_dump($ArrayOfNamesAndValues);
						?><br><?php
						*/

						//This section is identical to the one commented out above, except it does not have the debuggin pinting statements. If you wish to do so, feel free to delete the debugging portion. 
						$requesting = BackTogether($ArrName[$f]);
						//An intermediata array to hold the array values of the reuqested components.
						$InterArrayHold = GetMeTime($StructName,$requesting);
						//INserting the array of values into the 2D array of everything, using the compoennt name as key/index.
						$ArrayOfNamesAndValues[$requesting] = $InterArrayHold;
					}
					for($f=1; $f<$sizeName; $f++)
					{
						
						//the portion below prints out the intial row of Time headers and Names of components selected.
							?>
                            <th BGCOLOR="#ffff00" style="width:10px">Time</th>
                            <th BGCOLOR="#00ff00" style="width:10px"><?php echo("$ArrName[$f]") ?></th><?php
							
							
					}
					//The row ends at </tr>
					?>
                    </tr>
                    <tr><?php
					//A new row was made for the values and timestamps by using <tr>
					//The following two variables were used for the original printing functionality, and may be discarded
					//If you do not wish to use them.
					$maxcolumn = count($ArrName);
					$q = 0;
					//Keeps track of how many rows were printed
					$n=0;
					//Is used go keep track of how many elemts were printed/extracted
					$k = 0;
					//this will ensure we traverse through all the numbers, as ArrNum holds all the values for this structure 
					//retrieved from the database according to the reuest. We can therefore assume that the size of the array
					//is equivelent to the amount of numbers we have to print
					while($k < $sizeNum)
					{
						//Uncomment any vriables as needed
						//A counter
					//$n=0;
						//An array to hold old values for comparison of error 
					//$OldValues = array();
						//A safety margin, which is deterined by how much, at maximum, do you expect varibles to change. 
						//If you wish to haev a separate one for each parameter, you may turn this into an array, and  
						//do a similar thing to the one proposed below, isdie the base-case check. The safe margin shoudl be
						//between 0 and 1; i.e. 0=<$S.M.=<1. You may make it bigger if you wish.
					//$SafeMargin = 0; 
						//Get the first timestamp of the row, and assign it to a tem variable. 
						//the in the funciton below, for every name compare its timestamp to the primary one.
						//*** NOTE to self, for dispalying make it of the format Time|HookAngle|Time|TopAngle etc.
						//where each of the elements will have its timestamp, thiss will save space of the table, 
						//which will otherwise be very spread out, as no timestamp will be the same. 
						for($f=1; $f<$sizeName; $f++)
						{	
							//This function repeats all of its code for every name (component) selected in a structure.
							//One full pass through this loop, i.e. from $f=1 to $f=$sizeName is equivelent to printing one row						
							//As mentioned before, k keps track of the number of elements printed.
							$k = $k+1;
							//$requesting is a variable containing the name, put back together into a form which can make a 
							//request to other functions containing the actual name of the component. 
							$requesting = BackTogether($ArrName[$f]);
							//Because what we get back is an array containing times and values for this specific component, we 
							//store it in an intermediate array. 
							$ArrTemp = $ArrayOfNamesAndValues[$requesting];
							//In the testcase below we check whether the appropriate array is empty, 
							//or if it still has elements to print
							if(!empty($ArrTemp))
								{
										$mini = $ArrayOfNamesAndValues[$requesting];
										//Then we assign the value that is at an index which is determined by the progress the 
										//function has made while printing out the values. This variable contains a single string of 
										//time+value
										
										
											$mini2 = $mini[0];
											//var_dump($mini2);
											//here we send the string to be broken apart into two components, so that they can be 
											//printed out later 
											$s = StarOut($mini2);
											//And finally we print the components. 
											/*
											//This portion was commented out, to give you the possibility to omit it, if you wish to 
											//do so. In 
											//case you decide to use it, simply remove the comment sign from this paragraph. and also 
											//the previous
											//printing function, from where to where will be shown in the code. 
											if($n=0) 
											{
												//Here we check in the base case, if the value is outside the parameters it should be 
												//in, for 	
												//example the maximum the speed should be is 100, but the parameter reads 150, this 
												//will trigger 
												//this case. You will need to maek an array, either hard-coded, or through a database, 
												//and then 
												//retrieve it from there, using the component name as the key, you can use the 
												//functions here for 
												//that purpose. Feel free to not use this function at all. 
												
												//NOTE: If you wish to compare magnitudes of the numbers only, you may use the abs() 
												//function,
												//with the syntax looking like so: 
												//if(abs($SafeValue[$requesting]) < abs($s[1])) or any deviation of thereof if you 
												//decided to do
												//something else.
												
												if($SafeValue[$requesting] < $s[1])
												{
													//We print the value that is suspected to have an arror in bold, in a red cell.
														?><td BGCOLOR="#ffff00"><?php echo("$s[0]") ?></td> <?php
														?><th bgcolor="#FF0000"><?php echo("$s[1]") ?></th> <?php
														$OldValues[$requesting] = $s[1];
														array_shift($ArrayOfNamesAndValues[$requesting]);	
												}
												else
												{
													//If everything is fine, the number will be printed regularly.
														?><td BGCOLOR="#ffff00"><?php echo("$s[0]") ?></td> <?php
														?><td><?php echo("$s[1]") ?></td> <?php	
														$OldValues[$requesting] = $s[1];
														array_shift($ArrayOfNamesAndValues[$requesting]);
													
												}
											}
											
											else 
											{
													if((($OldValues[$requesting]-$s[1])/$OldValues[$requesting]) > $SafeMargin)
													{
														//We print the value that is suspected to have an arror in bold, in a red 
														//cell.
														?><td BGCOLOR="#ffff00"><?php echo("$s[0]") ?></td> <?php
														?><th bgcolor="#FF0000"><?php echo("$s[1]") ?></th> <?php
														$OldValues[$requesting] = $s[1];
														array_shift($ArrayOfNamesAndValues[$requesting]);	
														
													}
													
													else
												{
													//If everything is fine, the number will be printed regularly.
														?><td BGCOLOR="#ffff00"><?php echo("$s[0]") ?></td> <?php
														?><td><?php echo("$s[1]") ?></td> <?php	
														$OldValues[$requesting] = $s[1];
														array_shift($ArrayOfNamesAndValues[$requesting]);
													
												}
											}
											*/
											//If you wish to use the method above reomev the code starting from here
											?><td BGCOLOR="#ffff00"><?php echo("$s[0]") ?></td> <?php
											?><td><?php echo("$s[1]") ?></td> <?php	
											array_shift($ArrayOfNamesAndValues[$requesting]);
											//And up to this point
											
											//we shift our ArrNum array, even though we are not using it for the values inside it,											                                            //we use it as a reference point. when it is empty, it means we have no more numbers 
											//to display. 
								}
							/* In case the amount of elements in each array is not the same, this might be helpful.
							else 
								{
											?><td BGCOLOR="#ffff00"><?php echo("no time") ?></td> <?php
											?><td><?php echo("zero") ?></td> <?php		
								}
							*/			
									
						}
							 	//Increase the row count by one, since $n is the variable following the number of rows
								$n=$n+1;
								//And end the current row, by placing another </tr> command. 							
								?>
							
							</tr>
							<?php
						
					
					}
					
					/* //The old printing method, if you wish to simply print out all the numbers, and you are sure of their 
					   //predetermined spots, i.e. you know al of them have the same amount of everything. This is for concept 
					   //only, as it does not have an appropriate time-stamp capability.
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
					*/
					?>
					
					</tr>
                   	</table>
                    </div> 
                    </tr>
					<br><br><br><?php
     }
?></table>
<form method = "LINK" Action="/mongo/web_site/static date.php">
	<INPUT TYPE="submit" VALUE="Go Back">
</form>
</body>
</html>