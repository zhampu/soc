<?php

$data = [
  'title' => $page->title()->value(),
  'children' => array_values($page->children()->listed()->map(function ($event) {
    return [
      'id' => $event->id(),
      'title' => $event->title()->value(),
      'date' => $event->date()->value(),
      'headline' => $event->headline()->value(),
      'cover' => $event->cover() === null ? null : [
        'url' => $event->cover()->crop(800, 1000)->url(),
        'urlHome' => $event->cover()->resize(1024, 1024)->url(),
        'alt' => $event->cover()->alt()->value(),
      ],
      'guests' => $event->guests() === null ? null : [
        'url' => $event->guests()->url(),
        'name' => $event->guests()->name()->value(),
        'time' => $event->guests()->time()->value(),
      ]


    ];
  })->data())

];

kirby()->response()->json();
echo json_encode($data);
