<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\NotificationModel;
use App\Services\NotificationService;

class NotificationController extends Controller
{

    public function index()
    {
     
    }


    public function create()
    {

        $notification = new NotificationModel(
            id: null,
            type: 'info',
            content: 'This is a test notification.',
            senderId: '999054733327',
            receiverId: 'DcqxhaNIISX006Z2kZaOZ9i0IJg1',
            destination: '/',
            timestamp: now()->toDateTimeString(),
            isRead: false
        );

        // إنشاء الخدمة
        $notificationService = new NotificationService();

        // إضافة الإشعار
        $response = $notificationService->addNotificationToFirestore($notification);

        // طباعة النتيجة
        if ($response['success']) {
            echo $response['message'];
        } else {
            echo $response['message'];
        }
    }
    public function store()
    {
        
    }

    public function update(Request $request, string $id)
    {
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name)
    {
        
    }
}
