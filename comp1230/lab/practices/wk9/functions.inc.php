<?php
    function get_data($file_name = 'color_srgb.csv') {
        $colorList = [];
        $handle = fopen($file_name, 'r') or die("Not able to read file");
        if($handle) {
            while($entries = fgetcsv($handle)) {
                $colorList[] = $entries;
            }
        }
        return $colorList;
    }