<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/users', function () {
//     return view('users');
// });

// Route::get('/api/users', function () {
//     global $users;
//     return $users;
// });

// Route::get('/api/users/{userIndex}', function ($id) {
//     global $users;
//     if (array_key_exists($id, $users)) {
//         return $users[$id];
//     } else {
//         return 'Cannot find the user with index ' . $id;
//     }
// });



//Mission 5: Group routes
// Route::prefix('api')->group(function () {

//     Route::get('/users', function () {
//         global $users;
//         return $users;
//     });

//     Route::get('/users/{userIndex}', function ($id) {
//         global $users;
//         if (array_key_exists($id, $users)) {
//             return $users[$id];
//         } else {
//             return 'Yo can not get a user like this!';
//         }
//     });
// });


//Mission 6: Get posts
Route::prefix('api')->group(function () {

    Route::get('/users', function () {
        global $users;
        return $users;
    });

    Route::get('/users/{userIndex}', function ($userIndex) {
        global $users;
        if (array_key_exists($userIndex, $users)) {
            return $users[$userIndex];
        } else {
            return 'You cannot get a user like this!';
        }
    });

    Route::get('/users/{userIndex}/post/{postIndex}', function ($userIndex, $postIndex) {
        global $users;
        if (array_key_exists($userIndex, $users)) {
            $user = $users[$userIndex];
            if (array_key_exists($postIndex, $user['posts'])) {
                return $user['posts'][$postIndex];
            } else {
                return 'Cannot find the post with id ' . $postIndex . ' for user ' . $userIndex;
            }
        } else {
            return $users[$userIndex];
        }
    });
});