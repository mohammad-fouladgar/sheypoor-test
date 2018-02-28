<?php

namespace App\Http\Controllers;

use App\Entities\Motor;
use App\Http\Requests\StoreMotor;
use App\Http\Controllers\Foundation\Uploadable;
use App\Exceptions\InvalidUploadedFileException;

class MotorController extends Controller
{
    use Uploadable;

    // TODO : It can a motor repository
    private $motor;

    /**
     * Create a new controller instance.
     */
    public function __construct(Motor $motor)
    {
        $this->middleware('auth', [
            'except' => [
                'index', 'show',
            ],
        ]);

        $this->motor = $motor;
    }

    /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function create()
    {
        return view('create-motor');
    }

    /**
     * Store a motorbikes.
     *
     * @param StoreMotor $request
     *
     *@return \Illuminate\Http\Response
     */
    public function store(StoreMotor $request)
    {
        $data = $request->all();

        try {
            $photo = $this->upload($request->file('photo'), 'motors');

            $data['photo'] = current($photo);

            $this->createMotor($data);
        } catch (InvalidUploadedFileException $e) {
            return $this->sendFailedStoreResponse()
                        ->withErrors([
                            'invalidFile' => $e->getMessage(),
                        ]);
        } catch (\Exception $e) {
            // TODO : register a log info
            throw new Exception('Error Processing Request', 1);
        }

        $request->session()
                ->flash('status', 'Create motorbikes successful.');

        return redirect()->back();
    }

    /**
     * Send failed response.
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedStoreResponse()
    {
        return redirect()
                    ->back()
                    ->withInput();
    }

    /**
     * Create new Motor.
     *
     * @param array $data
     *
     * @return Motor
     */
    protected function createMotor(array $data): Motor
    {
        return $this->motor->create($data);
    }
}
