<?php

$data = [
  'title' => $page->title()->value(),
  'text' => $page->text()->kt()->value()
];

kirby()->response()->json();
echo json_encode($data);
