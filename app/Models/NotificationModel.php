<?php
namespace App\Models;

class NotificationModel {
    public $id;
    public $type;
    public $content;
    public $senderId;
    public $receiverId;
    public $destination;
    public $timestamp;
    public $isRead;

    public function __construct($id, $type, $content, $senderId, $receiverId, $destination, $timestamp, $isRead) {
        $this->id = $id;
        $this->type = $type;
        $this->content = $content;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->destination = $destination;
        $this->timestamp = $timestamp;
        $this->isRead = $isRead;
    }

    public static function fromFirestore($data, $id) {
        return new NotificationModel(
            $id,
            $data['type'] ?? '',
            $data['content'] ?? '',
            $data['senderId'] ?? '',
            $data['receiverId'] ?? '',
            $data['destination'] ?? null,
            $data['timestamp'],
            $data['isRead'] ?? false
        );
    }

    public function toFirestore() {
        return [
            'type' => $this->type,
            'content' => $this->content,
            'senderId' => $this->senderId,
            'receiverId' => $this->receiverId,
            'destination' => $this->destination,
            'timestamp' => $this->timestamp,
            'isRead' => $this->isRead,
        ];
    }
}
