<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء مستخدم جديد</title>
</head>
<body>
    <h1>نموذج إضافة مستخدم جديد</h1>

    <!-- عرض رسالة النجاح إذا كانت موجودة في الجلسة -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- الفورم -->
    <form action="{{ url('/insertt') }}" method="POST">
        @csrf
        <label for="yes">الاسم الأول:</label>
        <input type="text" id="yes" name="yes" required><br><br>

        <label for="no">الاسم الأخير:</label>
        <input type="text" id="no" name="no" required><br><br>

        <button type="submit">إضافة المستخدم</button>
    </form>
</body>
</html>
