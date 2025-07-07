<!-- <?php
// namespace App\Services;

// use Kreait\Firebase\Auth;
// use Kreait\Firebase\Firestore\FirestoreClient;
// use App\Models\UserModel;
// use Exception;

// class FirebaseService
// {
//     protected $auth;
//     protected $firestore;

//     public function __construct(Auth $auth, FirestoreClient $firestore)
//     {
//         $this->auth = $auth;
//         $this->firestore = $firestore;
//     }

//     public function createUser(UserModel $user, $password)
//     {
//         try {
//             // إنشاء مستخدم جديد في Firebase Authentication
//             $firebaseUser = $this->auth->createUserWithEmailAndPassword(
//                 $user->email,
//                 $password
//             );

//             // الحصول على معرف المستخدم من Firebase
//             $uid = $firebaseUser->uid;

//             // إضافة البيانات إلى Firestore
//             $this->firestore->collection('users')->document($uid)->set(
//                 $user->toFirestore()
//             );

//             return $firebaseUser;
//         } catch (Exception $e) {
//             // معالجة الأخطاء
//             throw new Exception('Error creating user: ' . $e->getMessage());
//         }
//     }

//     public function signInWithCustomIDAndPassword($email, $password)
//     {
//         try {
//             // تسجيل الدخول باستخدام البريد الإلكتروني وكلمة السر
//             $user = $this->auth->signInWithEmailAndPassword($email, $password);
//             return $user;
//         } catch (Exception $e) {
//             throw new Exception('Error signing in: ' . $e->getMessage());
//         }
//     }
// } -->
?>
