<?php
	$javascript = array("react", "vue", "angular");
	print_r($javascript);
	     echo "<br><br>";

	
	$state = array(
        "r" => "Redux",
        "v" => "Vuex",
        "a" => "Ngrx",
    );

	//array_merged
	echo "<br><br>";
    print('to merge to array in single one"');
    echo "<br>";
    $merged = array_merge($state, $javascript);
    print_r($merged); 

   //in_array
    echo "<br><br>";
    print('to check wheather values is exist in array or not"');
    echo "<br>";
    $framework = "laravel";
    echo in_array($framework, $javascript) ? 'Added' : 'Not yet!';

     //array_value
    echo "<br><br>";
    print('to get only values from array "array_values()"');
    echo "<br>";
    $mergedVal = array_values($merged);
    print_r($mergedVal); 

    echo "<br><br>";
    //only the keys
    print('to get only keys from array "array_key()"');
    echo "<br>";
    $keys = array_keys($state);
    print_r($keys);

    //to delete last element
    echo "<br><br>";
    print('to delete last value from value array_pop()"');
    echo "<br>";
    array_pop($state);

    print_r($state);

?>