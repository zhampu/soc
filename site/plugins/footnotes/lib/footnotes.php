<?php

class Footnotes {

    public static function convert($text, $remove = false, $without = false, $only = false, $kt = true) {
        $text = $kt ? kirbytext($text) : $text;

        $matches    = null;
        $references = null;
        $notes      = null;
        $notesStr   = '';

        // if there are notes
        if(preg_match_all('/\[(\^.*?)\]/s', $text, $matches)) {
            // return text without notes if needed
            if($remove) return self::remove($text, $matches);

            $references = $matches[0];
            $notes      = self::strip($matches);

            $count = 1;
            $order = 1;

            foreach($notes as $key => $note) {
                $data      = ['count' => $count, 'order' => $order, 'note' => $note];
                $text      = self::str_replace_first($references[$key], snippet('footnotes_reference', $data, true), $text);
                $notesStr .= snippet('footnotes_entry', $data, true);

                $count++;
                $order++;
            }

            $output = snippet('footnotes_container', ['footnotes' => $notesStr], true);

            if($only) { // return only the footnotes
                return $output;
            }
            elseif($without) { // return only the text with footnotes' numbers
                return $text;
            }
            else {
                return $text . $output;
            }
        }
        else {
            return $only ? '' : $text;
        }
    }

    /* Utils
    --------------------------*/

    public static function matches($text) {
        return preg_match_all('/\[(\^.*?)\]/s', $text, $matches);
    }
    public static function strip($matches) {
        return array_map(function($match) use($matches) {
          $match = preg_replace('/\[(\^(.*?))\]/s', '\2', $match);
          $match = str_replace(array('<p>','</p>'), '', kirbytext($match));
          return $match;
        }, $matches[0]);
    }
    public static function remove($text, $matches) {
        foreach($matches as $note) {
            $text = str_replace($note, '', $text);
        }
        return $text;
    }
    public static function str_replace_first($search, $replace, $str) {
        $pos = strpos($str, $search);
        if ($pos !== false) {
            return substr_replace($str, $replace, $pos, strlen($search));
        }
        return $str;
    }

}