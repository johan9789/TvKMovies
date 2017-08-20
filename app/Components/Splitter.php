<?php
namespace App\Components;

class Splitter {

    public function generate($collection, $isEloquent=false, $limit=1){
        $splittedValues = [];

        $index = 0;
        $newIndex = 0;

        $count = $isEloquent ? $collection->count() : count($collection);

        for($i=0;$i<$count;$i++){
            $splittedValues[$index][$newIndex] = $collection[$i];
            $newIndex += 1;

            if(($i + 1) % $limit == 0){
                $index += 1;
                $newIndex = 0;
            }
        }
        return $splittedValues;
    }

}
