<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login','LoginController@login');
Route::post('/login','LoginController@dashboard');
Route::post('/student_login','LoginController@studentDashboard');
Route::get('/','NoticeController@userHome');
Route::get('/view-notice/{id}','NoticeController@userViewNotice');
Route::get('view-notice/','NoticeController@adminViewNotice');

/* ################ ROUTE GROUP FOR ADMIN PANEL ################ */

Route::group(['middleware' => 'admin'], function() {

Route::get('/adminRegister','RegisterController@registerAdmin');
Route::get('/employeeRegister','RegisterController@registerEmployee');
Route::get('/studentRegister','RegisterController@registerStudent');
Route::get('/allAdmins','RegisterController@allAdmins');
Route::get('/allTeachers','RegisterController@allTeachers');
Route::get('/allStudents','RegisterController@allStudents');
Route::get('/deleteTeacher/{id}','RegisterController@deleteTeacher');
Route::get('/library-panel','LibraryController@index');
Route::post('/upload-book','LibraryController@uploadBook');
Route::get('/view-book','LibraryController@viewBook');
Route::get('/classroom_panel','ClassroomController@index');
Route::post('/create-department','ClassroomController@createDepartment');
Route::post('/create_classroom','ClassroomController@createClassroom');
Route::get('/edit_dept/{id}','ClassroomController@editDepartment');
Route::get('/generate-classroomCode','ClassroomController@createClassroomCode');
Route::get('/view_classroom','ClassroomController@viewClassrooms');
Route::get('/post_to_classroom/{id}','ClassroomController@postToClassroom');
Route::get('/view_classwise_students/{id}','ClassroomController@viewClasswiseStudents');
Route::get('/delete_enrolled_student/{student_id}','ClassroomController@deleteEnrolledStudent');
// Route::get('/delete_enrolled_student/{student_id}', ['as' => 'delete_enrolled_student', 'uses' => 'ClassroomController@deleteEnrolledStudent']);
Route::post('/post_data_to_classroom','ClassroomPostsController@postDataToClassroom');
Route::get('/delete_classroom/{id}','ClassroomController@deleteClassrooms');
Route::get('/notice','NoticeController@index');
Route::post('/post-notice','NoticeController@postNotice');
Route::get('/view-blogs','PostController@viewBlogForAdmin');
Route::get('/view-single-blog/{id}','PostController@viewSingleBlogForAdmin');
Route::get('/classroom_details_admin/{classroom_id}','ClassroomController@classroom_details_admin');



/* ################ ROUTE GROUP FOR USER PANEL ################ */

Route::get('/blog','PostController@viewBlog');
Route::post('/post-blog','PostController@postBlog');
Route::post('/post-comment', ['as'=>'post-comment', 'uses' => 'CommentController@postComment']);
Route::get('/profile','UserController@profile');
Route::get('/single_blog_post/{id}',['as'=>'single_blog_post', 'uses' => 'PostController@single_blog_post']);
Route::get('/classroom','ClassroomController@userClassroomPanel');
Route::post('/enroll_course','ClassroomController@enrollCourse');
Route::get('/classroom_details/{classroom_id}','ClassroomController@classroom_details');
Route::get('/view_classmates/{id}','ClassroomController@viewClassmates');
Route::get('/uneroll/{id}','ClassroomController@uneroll_students');
Route::get('/delete_classroom_comment/{id}','ClassroomController@deleteClassroomComment');
Route::post('/post_classroom_comment', ['as' => 'post_classroom_comment', 'uses' => 'ClassroomPostsController@classroomComment']);
Route::get('/post_classroom_comment', ['as' => 'post_classroom_comment', 'uses' => 'ClassroomPostsController@classroomComment']);
Route::get('/library','LibraryController@viewBookToUsers');

//Route::post('/register','RegisterController@registration');

Route::post('logout','LoginController@logout');
Route::post('student_logout','LoginController@student_logout');
Route::post('/register','RegisterController@registration');
Route::post('/update_data/{id}','RegisterController@updateRegisteredUserData');
Route::get('/dashboard','AdminController@adminPanel');

});