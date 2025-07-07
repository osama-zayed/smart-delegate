<?php

namespace App\Livewire;

use Livewire\Component;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Messaging;

class NotificationComponent extends Component
{
    public $student_select;
    public $student_name;
    public $notice_title;
    public $notice_content;
    public $notifications = [];
    public $students = [];
    public $currentUserToken;

    // في البداية جلب قائمة الطلاب
    public function mount()
    {
        $this->students = $this->getStudents();
    }


    public function submitNotification()
    {
        $firestore = app('firebase.firestore')->database();
        $notification = [
            'student_id' => $this->students[$this->student_select]["fcm_token"],
            'content' => $this->notice_content,
            'timestamp' => now()->toDateTimeString(),
            'type' => null,
            'senderId' => null,
            'receiverId' => $this->students[$this->student_select]["receiverId"],
            'destination' => null,
            'isRead' => false,
            
        ];

        $firestore->collection('notifications')->add($notification);
        $notification['notice_title'] = $this->notice_title;
        $this->sendNotification($notification);

        $this->notice_content = '';
        $this->notice_title = '';
        flash()->success('submit Notification .');
        $this->loadNotifications();
    }

    public function sendNotification($messageContent)
    {
        if (!$this->student_select) {
            flash()->error('Please select a student to send the notification.');
            return;
        }
        $messaging = app('firebase.messaging');
        $message = \Kreait\Firebase\Messaging\CloudMessage::new()
            ->withTarget('token', (string) $this->students[$this->student_select]["fcm_token"]) // إرسال التوكن بشكل مباشر
            ->withNotification(\Kreait\Firebase\Messaging\Notification::create($messageContent['notice_title'], $messageContent['content']));

        try {
            $messaging->send($message);
            session()->flash('success', 'Notification sent successfully.');
        } catch (\Throwable $e) {
            session()->flash('error', 'Failed to send notification: ' . $e->getMessage());
        }
    }



    public function loadNotifications()
    {
        if (!$this->student_select) {
            $this->notifications = [];
            return;
        }
        $firestore = app(abstract: 'firebase.firestore')->database();
        $notificationsCollection = $firestore->collection('notifications')
            ->where('receiverId', '=', $this->students[$this->student_select]["fcm_token"]);
        $notifications = [];
        foreach ($notificationsCollection->documents() as $document) {
            if ($document->exists()) {
                $notificationsData = $document->data();
                $notifications[] = [
                    'student_id' => $document->id(),
                    'name' => $this->students[$this->student_select]["name"] ?? '',
                    'content' => $notificationsData['content'] ?? '',
                    'receiverId' => $notificationsData['receiverId'] ?? '',
                ];
            }
        }
        $this->notifications = $notifications;
    }

    // وظيفة للحصول على قائمة الطلاب
    public function getStudents()
    {
        $firestore = app('firebase.firestore')->database();
        $collection = $firestore->collection('users');
        $data = [];
        foreach ($collection->documents() as $document) {
            if ($document->exists()) {
                $userData = $document->data();
                $data[] = [
                    'student_id' => $document->id(),
                    'name' => $userData['first_name'] . ' ' . $userData['last_name'],
                    'fcm_token' => $userData['fcm_token'] ?? '',
                ];
            }
        }
        return $data;
    }

    public function render()
    {
        return view('livewire.notification-component');
    }
}
