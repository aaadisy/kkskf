@extends('partials.app')
@section('pagename', 'New Apply')
@section('content')

<main class="p-6">
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 text-lg font-medium">New Apply</h4>
        <div class="md:flex hidden items-center gap-3 text-sm font-semibold">
            <a href="#" class="text-sm font-medium text-slate-700">{{ env('APP_NAME') }}</a>
            <i class="bx bx-chevron-right text-lg flex-shrink-0 text-slate-400"></i>
            <a href="#" class="text-sm font-medium text-slate-700">Enrollments</a>
            <i class="bx bx-chevron-right text-lg flex-shrink-0 text-slate-400"></i>
            <a href="#" class="text-sm font-medium text-slate-700" aria-current="page">Apply</a>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="p-6">
                <h4 class="card-title mb-4">New Apply</h4>

                <form class="grid lg:grid-cols-3 gap-6" method="post" action="{{ route('applicationstore') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="date_of_birth" class="text-gray-800 text-sm font-medium inline-block mb-2">Date Of Birth</label>
                        <input type="date" class="form-input" id="date_of_birth" name="date_of_birth" required>
                    </div>

                    <div>
                        <label for="gender" class="text-gray-800 text-sm font-medium inline-block mb-2">Gender</label>
                        <select name="gender" class="form-select" id="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div>
                        <label for="father_spouse_name" class="text-gray-800 text-sm font-medium inline-block mb-2">Father and Spouse Name</label>
                        <input type="text" class="form-input" id="father_spouse_name" name="father_spouse_name" value="" required>
                    </div>

                    <div>
                        <label for="e_card_number" class="text-gray-800 text-sm font-medium inline-block mb-2">e-Card Number</label>
                        <input type="text" class="form-input" id="e_card_number" name="e_card_number" required>
                    </div>

                    <div>
                        <label for="full_address" class="text-gray-800 text-sm font-medium inline-block mb-2">Full Address</label>
                        <input type="text" class="form-input" id="full_address" name="full_address" required>
                    </div>

                    <div>
                        <label for="mobile_number" class="text-gray-800 text-sm font-medium inline-block mb-2">Mobile Number</label>
                        <input type="text" class="form-input" id="mobile_number" name="mobile_number" required>
                    </div>

                    <div>
                        <label for="occupation" class="text-gray-800 text-sm font-medium inline-block mb-2">Occupation</label>
                        <input type="text" class="form-input" id="occupation" name="occupation" required>
                    </div>

                    <div>
                        <label for="pincode" class="text-gray-800 text-sm font-medium inline-block mb-2">Pin code</label>
                        <input type="text" class="form-input" id="pincode" name="pincode" required>
                    </div>

                    <div>
                        <label for="cast" class="text-gray-800 text-sm font-medium inline-block mb-2">Cast (SC/ST/OBC/MOBC/GEN/OTHERS)</label>
                        <select name="cast" class="form-select" id="cast" required>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="OBC">OBC</option>
                            <option value="MOBC">MOBC</option>
                            <option value="GEN">GEN</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                    </div>

                    <div>
                        <label for="total_family_members" class="text-gray-800 text-sm font-medium inline-block mb-2">Total Family Members</label>
                        <input type="number" class="form-input" id="total_family_members" name="total_family_members" required>
                    </div>

                    <div>
                        <label for="district" class="text-gray-800 text-sm font-medium inline-block mb-2">DISTRICT</label>
                        <input type="text" class="form-input" id="district" name="district" required>
                    </div>

                    <div>
                        <label for="block" class="text-gray-800 text-sm font-medium inline-block mb-2">BLOCK</label>
                        <input type="text" class="form-input" id="block" name="block" required>
                    </div>

                    <div>
                        <label for="ulb" class="text-gray-800 text-sm font-medium inline-block mb-2">ULB</label>
                        <input type="text" class="form-input" id="ulb" name="ulb" required>
                    </div>

                    <div>
                        <label for="block_ulb_name" class="text-gray-800 text-sm font-medium inline-block mb-2">BLOCK/ULB NAME</label>
                        <input type="text" class="form-input" id="block_ulb_name" name="block_ulb_name" required>
                    </div>

                    <div>
                        <label for="document_type" class="text-gray-800 text-sm font-medium inline-block mb-2">SELECT DOCUMENT TYPE</label>
                        <select name="document_type" class="form-select" id="document_type" required>
                            <option value="Aadhaar">Aadhaar</option>
                            <option value="PAN">PAN</option>
                            <option value="Voter ID">Voter ID</option>
                        </select>
                    </div>

                    <div>
                        <label for="document_number" class="text-gray-800 text-sm font-medium inline-block mb-2">DOCUMENT NUMBER</label>
                        <input type="text" class="form-input" id="document_number" name="document_number" required>
                    </div>

                    <div>
                        <label for="photo" class="text-gray-800 text-sm font-medium inline-block mb-2">UPLOAD PHOTO (Max 50KB)</label>
                        <input type="file" class="form-input" id="photo" name="photo" accept="image/*" required>
                    </div>

                    <div class="col-span-3">
                        <button class="btn bg-primary text-white" type="submit">Apply Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
