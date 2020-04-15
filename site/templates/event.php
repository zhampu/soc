<?php

$data = [
  'title' => $page->title()->value(),
  'headline' => $page->headline()->or($page->title())->value(),
  'description' => $page->description()->text()->footnotes(),
  'editor' => $page->editor()->text()->blocks()->html(),
  'guests' => $page->guests() === null ? null : [
    'url' => $page->guests()->url(),
    'name' => $page->guests()->name()->value(),
    'time' => $page->guests()->time()->value(),
  ],
  'date' => $page->date()->toDate('d.m.Y'),
  'tags' => $page->tags()->isNotEmpty() ? $page->tags()->value() : null,
  'cover' => $page->cover() === null ? null : [
    'url' => $page->cover()->crop(1024, 768)->url(),
    'alt' => $page->cover()->alt()->value()
  ],
  'gallery' => array_values($page->images()->sortBy('sort')->map(function ($image) {
    return [
      'link' => $image->link()->or($image->url())->value(),
      'url' => $image->crop(800, 1000)->url(),
      'alt' => $image->alt()->value()
    ];
  })->data())
];

kirby()->response()->json();
echo json_encode($data);
