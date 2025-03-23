<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeAddressUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\StudentInformationUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\UploadQrCodeRequest;
use App\Models\QrCodeImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Student;




class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     *
     * If admin/ not
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $homeAddress = $request->user()->homeAddress;
        $students = $request->user()->student;

        if ($user->userType === 'admin') {
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        } else {

            return view('profile.edit', [
                'user' => $request->user(),
                'homeAddress' => $homeAddress,
                'students' => $students,
            ]);
        }
    }

    public function uploadQrCode(Request $request)
    {
        $request->validate([
            'qr_code_image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        try {
            // Log::debug('File upload request: ', $request->all());

            $newQrCodeName = uniqid() . '-' . 'qr_code' . '.' . $request->qr_code_image->extension();
            // Log::debug("Generated file name: $newQrCodeName");

            $filePath = $request->qr_code_image->move(public_path('qr-codes'), $newQrCodeName);
            // Log::debug("File stored successfully");

            QrCodeImage::create([
                'user_id' => auth()->user()->id,
                'qr_code_image' => $newQrCodeName,
            ]);
            // Log::debug("Database insertion successful");

            return redirect()->route('profile.edit')->with('success', 'QR code uploaded successfully!');
        } catch (\Exception $e) {
            // Log::error("Error uploading QR code: $e");
            return redirect()->route('profile.edit')->with('error', 'Failed to upload QR code');
        }
    }

    public function getQrCode()
    {
        $latestQrCodeImage = QrCodeImage::latest()->first();

        if ($latestQrCodeImage) {
            $filePath = public_path('qr-codes/'. $latestQrCodeImage->qr_code_image);
            $image = file_get_contents($filePath);
            return response()->make($image, 200)
                ->header('Content-Type', 'image/jpeg')
                ->header('Content-Disposition', 'inline; filename="'. $latestQrCodeImage->qr_code_image. '"');
        } else {
            return response()->make('QR code not found', 404);
        }
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $validatedData = $request->validated();
        $user->fill($validatedData);
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateHomeAddress(HomeAddressUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->userType !== 'admin') {
            $homeAddress = $user->homeAddress;
            $validatedData = $request->validated();
            $homeAddress->fill($validatedData);
            $homeAddress->save();
        }

        return Redirect::route('profile.edit')->with('status', 'home-address-updated');
    }

    public function updateStudentInformation(StudentInformationUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->userType !== 'admin') {
            $students = $request->input('students', []);

            foreach ($students as $studentData) {
                if (isset($studentData['id']) && $studentData['id'] > 0) {
                    // Update existing student
                    $student = $user->student()->where('id', $studentData['id'])->first();
                    if ($student) {
                        $student->fill($studentData);
                        $student->save();
                    }
                } else {
                    // Create new student
                    $student = new Student();
                    $student->fill($studentData);
                    $student->user_id = $user->id;
                    $student->save();
                }
            }
        }

        return Redirect::route('profile.edit')->with('status', 'student-information-updated');
    }

    public function storeStudent(Request $request): RedirectResponse
{
    $user = $request->user();

    $request->validate([
        'new_student.sname' => 'required|string|max:255',
        'new_student.mykid_number' => 'required|string|max:255|unique:students,mykid_number,null,id,user_id,'. $user->id,
        'new_student.sbirth_date' => 'required|date',
        'new_student.age' => 'required|integer',
        'new_student.gender' => 'required|string',
        'new_student.class_of' => 'required|string',
    ]);

    $newStudent = new Student();
    $newStudent->sname = $request->input('new_student.sname');
    $newStudent->mykid_number = $request->input('new_student.mykid_number');
    $newStudent->sbirth_date = $request->input('new_student.sbirth_date');
    $newStudent->age = $request->input('new_student.age');
    $newStudent->gender = $request->input('new_student.gender');
    $newStudent->class_of = $request->input('new_student.class_of');
    $newStudent->user_id = $user->id;

    if ($newStudent->save()) {
        return redirect()->route('profile.edit')->with('status', 'student-information-updated');
    } else {
        // Handle validation errors or other issues
        return redirect()->route('profile.edit')->with('error', 'Failed to create student');
    }
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
