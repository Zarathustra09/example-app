@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Corporate Member') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register.corporate') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="company_name" class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Add other fields from the corporate_users table -->

                        <div class="row mb-3">
                            <label for="industry" class="col-md-4 col-form-label text-md-end">{{ __('Industry') }}</label>
                        
                            <div class="col-md-6">
                                <select id="industry" class="form-control @error('industry') is-invalid @enderror" name="industry">
                                    <option value="" selected disabled>Select Industry</option>
                                    @foreach(config('industries.options') as $value => $label)
                                        <option value="{{ $value }}" {{ old('industry') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                        
                                @error('industry')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="region" class="col-md-4 col-form-label text-md-end">{{ __('Region') }}</label>

                            <div class="col-md-6">
                                <select id="region" class="form-control @error('region') is-invalid @enderror" name="region">
                                    <option value="" selected disabled>Select Region</option>
                                    @foreach(config('countries') as $code => $country)
                                        <option value="{{ $code }}" {{ old('nationality') == $code ? 'selected' : '' }}>{{ $country }}</option>
                                    @endforeach
                                </select>

                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact_number" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus>

                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="fax_number" class="col-md-4 col-form-label text-md-end">{{ __('Fax Number') }}</label>

                            <div class="col-md-6">
                                <input id="fax_number" type="text" class="form-control @error('fax_number') is-invalid @enderror" name="fax_number" value="{{ old('fax_number') }}" required autocomplete="fax_number" autofocus>

                                @error('fax_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website" autofocus>

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="products_offered" class="col-md-4 col-form-label text-md-end">{{ __('Products Offered') }}</label>

                            <div class="col-md-6">
                                <input id="products_offered" type="text" class="form-control @error('products_offered') is-invalid @enderror" name="products_offered" value="{{ old('products_offered') }}" required autocomplete="products_offered" autofocus>

                                @error('products_offered')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_employees" class="col-md-4 col-form-label text-md-end">{{ __('No. of Employees') }}</label>

                            <div class="col-md-6">
                                <input id="no_employees" type="text" class="form-control @error('no_employees') is-invalid @enderror" name="no_employees" value="{{ old('no_employees') }}" required autocomplete="no_employees" autofocus>

                                @error('no_employees')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        


                        <!-- Add more fields as needed -->

                        <!-- The rest of the form remains unchanged -->

                        <div class="form-group row mb-3">
                            <label for="registration_form" class="col-md-4 col-form-label text-md-end">{{ __('Registration Form') }}</label>
                    
                            <div class="col-md-6">
                                <input id="registration_form" type="file" class="form-control-file @error('registration_form') is-invalid @enderror" name="registration_form" required>
                                
                                @error('registration_form')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row mb-3">
                            <label for="proof_of_payment" class="col-md-4 col-form-label text-md-end">{{ __('Proof of Payment') }}</label>
                    
                            <div class="col-md-6">
                                <input id="proof_of_payment" type="file" class="form-control-file @error('proof_of_payment') is-invalid @enderror" name="proof_of_payment" required>
                                
                                @error('proof_of_payment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- The rest of the form remains unchanged -->

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
