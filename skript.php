<?php

//http://stackoverflow.com/questions/19067556/php-algorithm-to-generate-all-combinations-of-a-specific-size-from-a-single-set
function sampling($chars, $size, $combinations = array()) {

    # if it's the first iteration, the first set 
    # of combinations is the same as the set of characters
    if (empty($combinations)) {
        $combinations = $chars;
    }

    # we're done if we're at size 1
    if ($size == 1) {
        return $combinations;
    }

    # initialise array to put new values in
    $new_combinations = array();

    # loop through existing combinations and character set to create strings
    foreach ($combinations as $combination) {
        foreach ($chars as $char) {
            $new_combinations[] = $combination . $char;
        }
    }

    # call same function again for the next iteration
    return sampling($chars, $size - 1, $new_combinations);

}

// possible valid characters
$valid = array(
"B",
"C",
"D",
"F",
"G",
"H",
"J",
"K",
"M",
"P",
"Q",
"R",
"T",
"V",
"W",
"X",
"Y",
"Z",
"2",
"3",
"4",
"6",
"7",
"8",
"9");

/* Possible combinations with above array

1 - missing = 25
2 - missing = 625
3 - missing = 15625
4 - missing = 390 625
5 - missing = 9765 625

*/

// form variables
$char_1 = strtoupper($_POST['char_1']);
$char_2 = strtoupper($_POST['char_2']);
$char_3 = strtoupper($_POST['char_3']);
$char_4 = strtoupper($_POST['char_4']);
$char_5 = strtoupper($_POST['char_5']);

$char_6 = strtoupper($_POST['char_6']);
$char_7 = strtoupper($_POST['char_7']);
$char_8 = strtoupper($_POST['char_8']);
$char_9 = strtoupper($_POST['char_9']);
$char_10 = strtoupper($_POST['char_10']);

$char_11 = strtoupper($_POST['char_11']);
$char_12 = strtoupper($_POST['char_12']);
$char_13 = strtoupper($_POST['char_13']);
$char_14 = strtoupper($_POST['char_14']);
$char_15 = strtoupper($_POST['char_15']);

$char_16 = strtoupper($_POST['char_16']);
$char_17 = strtoupper($_POST['char_17']);
$char_18 = strtoupper($_POST['char_18']);
$char_19 = strtoupper($_POST['char_19']);
$char_20 = strtoupper($_POST['char_20']);

$char_21 = strtoupper($_POST['char_21']);
$char_22 = strtoupper($_POST['char_22']);
$char_23 = strtoupper($_POST['char_23']);
$char_24 = strtoupper($_POST['char_24']);
$char_25 = strtoupper($_POST['char_25']);

// put input data into array
$input = array(
$char_1,
$char_2,
$char_3,
$char_4,
$char_5,
$char_6,
$char_7,
$char_8,
$char_9,
$char_10,
$char_11,
$char_12,
$char_13,
$char_14,
$char_15,
$char_16,
$char_17,
$char_18,
$char_19,
$char_20,
$char_21,
$char_22,
$char_23,
$char_24,
$char_25
);

$arraylength=count($valid); // 25

$missing = 0; // counter for how how many digits are missing from code
$temp = array(); // declare new array

// If $input array index value is empty then input value NULL (string) AND update counter $missing for combination generation
for($counter = 0; $counter<$arraylength; $counter++){
	if(!isset($input[$counter]) || trim($input[$counter]) == ""){
		$input[$counter] = 'null';
		$missing++;
	}
}

if($missing == 0){
	
	echo implode($input);
	
}elseif($missing == 1){
	
	// find the missing position in $input array
	$missing_position = 0;	
	while($input[$missing_position] != 'null'){
	$missing_position++;
	}
	
	//in the missing position put in value from $valid array and repeat
	for($counter = 0; $counter<$arraylength; $counter++){
	$input[$missing_position] = $valid[$counter];
	$temp[] = implode($input); // $input array into a string which is input into array $temp
	}	
	
	//Show neatly in one line
	foreach ( $temp as $item ) {
        echo $item . "<br/>";
    }
	
	//print_r($temp); // FUNKAB!!!!!
	
}elseif($missing == 2){
	
	$output = sampling($valid, $missing); //array of combinations
	
	// find the missing position #1 in $input array
	$missing_position_1 = 0;	
	while($input[$missing_position_1] != 'null'){
		$missing_position_1++;
	}
	
	// find the missing position #2 in $input array
	$missing_position_2 = $missing_position_1 + 1;	
	while($input[$missing_position_2] != 'null'){
		$missing_position_2++;
	}
		
	//	use the $output string to simply replace missing array positions
	for($counter = 0; $counter<count($output); $counter++){
		$output_string = $output[$counter]; // get element from array $output as string
		$input[$missing_position_1] = $output_string[0]; // get first string letter by using [0] for a string, same principle as for an array
		$input[$missing_position_2] = $output_string[1]; // get second string letter by using [1] for a string, same principle as for an array
		$temp[] = implode($input);
		}
		
	//Show neatly in one line
	foreach ( $temp as $item ) {
        echo $item . "<br/>";
    }
		
	//print_r($temp); // FUNKAB!!!
	
}elseif($missing == 3){
	
	$output = sampling($valid, $missing); //array of combinations
	
	// find the missing position #1 in $input array
	$missing_position_1 = 0;	
	while($input[$missing_position_1] != 'null'){
		$missing_position_1++;
	}
	
	// find the missing position #2 in $input array
	$missing_position_2 = $missing_position_1 + 1;	
	while($input[$missing_position_2] != 'null'){
		$missing_position_2++;
	}
	
	// find the missing position #3 in $input array
	$missing_position_3 = $missing_position_2 + 1;	
	while($input[$missing_position_3] != 'null'){
		$missing_position_3++;
	}
	
	//	use the $output string to simply replace missing array positions
	for($counter = 0; $counter<count($output); $counter++){
		$output_string = $output[$counter]; // get element from array $output as string
		$input[$missing_position_1] = $output_string[0];
		$input[$missing_position_2] = $output_string[1];
		$input[$missing_position_3] = $output_string[2];
		$temp[] = implode($input);
		}
		
	//Show neatly in one line
	foreach ( $temp as $item ) {
        echo $item . "<br/>";
    }
	
	// print_r($temp); // FUNKAB!!!
	
}elseif($missing == 4){
	
	$output = sampling($valid, $missing); //array of combinations
	
	// find the missing position #1 in $input array
	$missing_position_1 = 0;	
	while($input[$missing_position_1] != 'null'){
		$missing_position_1++;
	}
	
	// find the missing position #2 in $input array
	$missing_position_2 = $missing_position_1 + 1;	
	while($input[$missing_position_2] != 'null'){
		$missing_position_2++;
	}
	
	// find the missing position #3 in $input array
	$missing_position_3 = $missing_position_2 + 1;	
	while($input[$missing_position_3] != 'null'){
		$missing_position_3++;
	}
	
	// find the missing position #4 in $input array
	$missing_position_4 = $missing_position_3 + 1;	
	while($input[$missing_position_4] != 'null'){
		$missing_position_4++;
	}
	
	//	use the $output string to simply replace missing array positions
	for($counter = 0; $counter<count($output); $counter++){
		$output_string = $output[$counter]; // get element from array $output as string
		$input[$missing_position_1] = $output_string[0];
		$input[$missing_position_2] = $output_string[1];
		$input[$missing_position_3] = $output_string[2];
		$input[$missing_position_4] = $output_string[3];
		$temp[] = implode($input);
		}
	
	//Show neatly in one line
	foreach ( $temp as $item ) {
        echo $item . "<br/>";
    }
	
	// print_r($temp); // FUNKAB!!!
	
}else{
	echo "<strong>ERROR:</strong>";
	echo "<br>";
	echo "Only up to 4 missing characters can be added as the count of possible combinations will otherwise exceed 1 million.";
	echo "<br>";
	echo "Probability to get the correct code becomes	insignificant.";
	exit();
}
  ?>