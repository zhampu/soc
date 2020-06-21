<?php

$data = [
  'title' => $page->title()->value(),
  'headline' => $page->headline()->or($page->title())->value(),
  'description' => $page->description()->kt()->footnotes(),
  'editor' => $page->editor()->text()->blocks()->html(),
  'guests' => array_values($page->guests()->toStructure()->map(function ($guests) {
    return [
      'url' => $guests->url()->value(),
      'name' =>$guests->name()->value(),
      'time' =>$guests->time()->toDate('H:i'),
    ];
  })->data()),
  'toggle' => $page->toggle()->value(),
  'live' => $page->toggle()->value(),
  'streamurl' => $page->streamurl()->value(),
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
