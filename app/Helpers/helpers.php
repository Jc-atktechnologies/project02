<?php

if (!function_exists('substr_index')) {
    function substr_index($subject, $delimiter, $from = 0, $length = NULL) {

        if (!str_contains($subject, $delimiter)) {
            return $subject;
        }

        if ($from > 0) {
            $from = $from - 1;

            return implode($delimiter, array_slice(explode($delimiter, $subject), $from, $length));
        } else {
            return implode($delimiter, array_slice(explode($delimiter, $subject), $from, $length));
        }
    }
}
