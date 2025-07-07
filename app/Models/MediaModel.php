<?php
namespace App\Models;

use DateTime;

class MediaModel {
    public $mediaId;
    public $mediaType;
    public $content;
    public $createdId;
    public $roomId;
    public $fileUrl;
    public $timestamp;
    public $options;
    public $isAssignment;
    public $deadline;

    public function __construct($mediaId, $mediaType, $content, $createdId, $roomId, $timestamp, $isAssignment, $fileUrl = null, $options = null, $deadline = null) {
        $this->mediaId = $mediaId;
        $this->mediaType = $mediaType;
        $this->content = $content;
        $this->createdId = $createdId;
        $this->roomId = $roomId;
        $this->timestamp = $timestamp;
        $this->fileUrl = $fileUrl;
        $this->options = $options;
        $this->isAssignment = $isAssignment;
        $this->deadline = $deadline;
    }

    public function toMap() {
        return [
            'mediaId' => $this->mediaId,
            'mediaType' => $this->mediaType,
            'content' => $this->content,
            'createdId' => $this->createdId,
            'roomId' => $this->roomId,
            'timestamp' => $this->timestamp->format('Y-m-d H:i:s'),
            'fileURL' => $this->fileUrl,
            'options' => $this->options,
            'isAssignment' => $this->isAssignment,
            'deadline' => $this->deadline ? $this->deadline->format('Y-m-d H:i:s') : null,
        ];
    }

    public static function fromMap($map) {
        return new MediaModel(
            $map['mediaId'],
            $map['mediaType'],
            $map['content'],
            $map['createdId'],
            $map['roomId'],
            new DateTime($map['timestamp']),
            $map['isAssignment'],
            $map['fileURL'],
            $map['options'],
            isset($map['deadline']) ? new DateTime($map['deadline']) : null
        );
    }
}
