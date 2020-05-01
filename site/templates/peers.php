<?php

$data = [
  'title' => $page->title()->value(),
  'children' => array_values($page->children()->listed()->map(function ($peer) {
    return [
      'id' => $peer->id(),
      'title' => $peer->title()->value(),
      'date' => $peer->date()->value(),
      'headline' => $peer->headline()->value(),
      'cover' => $peer->cover() === null ? null : [
        'url' => $peer->cover()->crop(800, 1000)->url(),
        'urlHome' => $peer->cover()->resize(1024, 1024)->url(),
        'alt' => $peer->cover()->alt()->value(),
      ],
      'guests' => $peer->guests() === null ? null : [
        'url' => $peer->guests()->url(),
        'name' => $peer->guests()->name()->value(),
        'time' => $peer->guests()->time()->value(),
      ]


    ];
  })->data())

];

kirby()->response()->json();
echo json_encode($data);
