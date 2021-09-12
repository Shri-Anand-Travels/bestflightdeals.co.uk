<?php

if (!function_exists('cabinType')) {
    function cabinType($cabin): string
    {
        return match ($cabin) {
            "1" => "First Class",
            "2" => "Business",
            "3" => "Premium Economy",
            "4" => "Economy",
            default => "",
        };
    }
}

if (!function_exists('stopOrDirect')) {
    function stopOrDirect($stop): string
    {
        return match ($stop) {
            "Y" => "DIRECT",
            "N" => "1 STOP",
            default => "",
        };
    }
}

if (!function_exists('flightGoDepartTime')) {
    function flightGoDepartTime($flight): string
    {
        return $flight->go_dep_time;
    }
}

if (!function_exists('flightInDepartTime')) {
    function flightInDepartTime($flight): string
    {
        return $flight->in_dep_time;
    }
}

if (!function_exists('flightDestination')) {
    function flightDestination($flight): string
    {
        if ($flight->Journey == "O") {
            $destination = $flight->Destination;
        } elseif ($flight->Journey == "R") {
            $destination = match ($flight->Direct) {
                "Y" => $flight->go_arrival,
                default => $flight->Destination,
            };
        }
        return empty($destination) ? '' : $destination;
    }
}

if (!function_exists('flightArriveGoTime')) {
    function flightArriveGoTime($flight): string
    {

        if ($flight->Journey == "O") {
            $arrivalTime = match ($flight->Direct) {
                "N" => $flight->go_via_arr_time,
                "Y" => $flight->go_arr_time,
                default => "",
            };
        } elseif ($flight->Journey == "R") {
            $arrivalTime = match ($flight->Direct) {
                "N" => $flight->go_via_arr_time,
                "Y" => $flight->go_arr_time,
                default => "",
            };
        }
        return empty($arrivalTime) ? '' : $arrivalTime;
    }
}

if (!function_exists('flightArriveInTime')) {
    function flightArriveInTime($flight): string
    {
        if ($flight->Journey == "O") {
            $arrivalTime = $flight->in_arr_time;
        } elseif ($flight->Journey == "R") {
            $arrivalTime = match ($flight->Direct) {
                "N" => $flight->in_via_arr_time,
                "Y" => $flight->in_arr_time,
                default => "",
            };
        }
        return empty($arrivalTime) ? '' : $arrivalTime;
    }
}

if (!function_exists('flightArrivalInSource')) {
    function flightArrivalInSource($flight): string
    {
        if ($flight->Journey == "O") {
            $arrivalTime = $flight->Source;
        } elseif ($flight->Journey == "R") {
            $arrivalTime = match ($flight->Direct) {
                "N" => $flight->in_via_arrival,
                "Y" => $flight->in_arrival,
                default => $flight->Source,
            };
        }
        return empty($arrivalTime) ? '' : $arrivalTime;
    }
}
