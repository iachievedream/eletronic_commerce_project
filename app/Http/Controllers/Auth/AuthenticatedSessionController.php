<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Post(
 *     path="/login",
 *     summary="登入",
 *     description="使用者登入並建立認證會話",
 *     operationId="storeSession",
 *     tags={"Authentication"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="使用者登入資訊",
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="password123"),
 *             @OA\Property(property="password_confirmation", type="string", format="password", example="password123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="登入成功，無內容返回"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="認證失敗，登入資訊錯誤",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="These credentials do not match our records.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="資料驗證錯誤",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The email field is required."),
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="email", type="array", @OA\Items(type="string", example="The email field is required."))
 *             )
 *         )
 *     )
 * )
 */
class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request): Response
    {
        $request->authenticate();

        $request->session()->regenerate();

        return response()->noContent();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
