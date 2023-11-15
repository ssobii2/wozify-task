<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSearchRequest;
use App\Repositories\UserRepository;

/**
 * Class UserController
 *
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the home view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Search for users based on the provided query.
     *
     * @param UserSearchRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(UserSearchRequest $request)
    {
        $users = $this->userRepository->search($request->get('query'));

        return response()->json($users);
    }
}
