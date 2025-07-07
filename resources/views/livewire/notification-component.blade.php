<div class="row">
    <!-- نموذج إضافة إشعار -->
    <div class="col-md-6 mb-30">
        <div class="card card-statistics">
            <div class="card-body">
                <form wire:submit.prevent="submitNotification" autocomplete="off">
                    @csrf
                    <h3 style="font-family: 'Cairo', sans-serif;">Add Notification</h3><br>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-10">
                            <label for="student_id">Student
                                <span class="text-danger">*
                                    @error('student_id') {{ $message }} @enderror
                                </span>
                            </label>
                            <select class="form-control h-65" wire:change="loadNotifications" wire:model="student_select" id="student_id" required>
                                <option value="" disabled selected>Select a student from the list.</option>
                                @foreach ($students as $key => $student)
                                <option value="{{ $key  }}">{{ $student['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-10">
                            <label for="notice_title">Notification title
                            <span class="text-danger">*
                                    @error('notice_title') {{ $message }} @enderror
                                </span>
                            </label>
                            <input type="text" class="form-control" wire:model="notice_title" name="notice_title" id="notice_title" required>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-10">
                            <label for="notice_content">Notification content
                            <span class="text-danger">*
                                    @error('notice_content') {{ $message }} @enderror
                                </span>
                            </label>
                            <textarea class="form-control" wire:model="notice_content" name="notice_content" id="notice_content" cols="10" rows="3" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm nextBtn btn-lg pull-right" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- عرض الإشعارات -->
    <div class="col-md-6 mb-30">
        <div class="card custom-notification-card">
            <div class="card-body custom-notifications-scroll">
                <!-- Display notifications dynamically -->
                @foreach ($notifications as $notification)
                <div class="custom-notification-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">{{ $notification['name'] }}</h6>
                            </div>
                            <p class="custom-notification-content mb-0">
                                {{ $notification['content'] }}
                            </p>
                        </div>
                        <div class="custom-notification-icon ms-3">
                            <i class="fas fa-bell"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>