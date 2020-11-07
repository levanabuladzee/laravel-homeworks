<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateApplicantRequest;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function getApplicants() {
        $applicants = Applicant::all();

        return view('applicant_list')->with("applicants", $applicants);
    }

    public function getEditApplicant($id) {
        $applicant = Applicant::findOrFail($id);

        return view('edit')->with('applicant', $applicant);
    }

    public function updateApplicant(UpdateApplicantRequest $request, $id) {
        $applicant = Applicant::findOrFail($id);

        $applicant->update($request->all());

        return redirect('/');
    }

    public function hired(Applicant $applicant)
    {
        $applicant->update(['is_hired' => 1]);

        return back();
    }
}
