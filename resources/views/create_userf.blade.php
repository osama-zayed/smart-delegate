<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء مستخدم جديد</title>
</head>
<body>
    <h1>نموذج إضافة مستخدم جديد</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @elseif(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form method="POST" action="{{ url('/create-userf') }}">
    @csrf
    <label for="ID">المعرف (ID):</label>
    <input type="text" id="ID" name="ID" required><br><br>

    <label for="password">كلمة المرور:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="first_name">الاسم الأول:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">اسم العائلة:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="phone">رقم الهاتف:</label>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="address">العنوان:</label>
    <input type="text" id="address" name="address" required><br><br>

    <label for="email">email</label>
    <input type="text" id="email" name="email" ><br><br>

    <label for="role">الدور:</label>
    <input type="text" id="role" name="role" required><br><br>
    
    <label for="year">year</label>
    <input type="text" id="year" name="year" required><br><br>

    <label for="Department">Department</label>
    <input type="text" id="Department" name="Department" required><br><br>

    <button type="submit">إضافة المستخدم</button>
</form>

</body>
</html>
