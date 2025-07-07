<?php

namespace App\Services;

use App\Models\NotificationModel;

class NotificationService
{
    public function addNotificationToFirestore(NotificationModel $notification)
    {
        try {
            // الاتصال بـ Firestore
            $firestore = app('firebase.firestore')->database();
            $collection = $firestore->collection('notifications');

            // تحويل الإشعار إلى صيغة Firestore
            $data = $notification->toFirestore();

            // إضافة الإشعار
            $collection->add($data);

            return [
                'success' => true,
                'message' => 'Notification added successfully!',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Failed to add notification: ' . $e->getMessage(),
            ];
        }
    }
}
