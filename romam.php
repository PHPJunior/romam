<?php

const MULTIPLIER_1 = 1;
const MULTIPLIER_2 = 1;
const MULTIPLIER_3 = -1;
const MULTIPLIER_4 = -1;

function finalPosition($move)
{
    $path = $move;

    // Current position of the robot
    $x = 0;
    $y = 0;
    $directionNumber = 1;

    $direction = [ 
        1 => 'TOP', 
        2 => 'RIGHT', 
        3 => 'BOTTOM', 
        4 => 'LEFT'
    ];
    
    for($i = 0; $i < strlen($path); $i++)
    {
        switch ($path[$i]) {

            case 'R':
                if($directionNumber == 4){
                    $directionNumber = 1;
                } else {
                    $directionNumber++;
                }
                break;

            case 'L':
                if($directionNumber == 1){
                    $directionNumber = 4;
                } else {
                    $directionNumber--;
                }
                break;
            
            case 'F':
                if( !($directionNumber % 2) ){
                    $x += $path[$i+1] * constant("MULTIPLIER_".$directionNumber);
                } else {
                    $y += $path[$i+1] * constant("MULTIPLIER_".$directionNumber);
                }
                break;
        }
    }

    echo "X:".$x. "; Y:".$y."; D:". $direction[$directionNumber];
}

finalPosition($argv[1]);