@extends('layouts.app', ['page' => 'New Company', 'pageSlug' => 'company', 'section' => 'management'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">New Company</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('companies.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('companies.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">Company Information</h6>
                            <div class="pl-lg-4">

                                <div class="col-4">
                                <div class="form-group{{ $errors->has('sector_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-sector">Sector Name</label>
                                    <select name="sector_id" id="input-sector" class="form-select form-control-alternative{{ $errors->has('sector_id') ? ' is-invalid' : '' }}" required>
                                        @foreach ($sectors as $sector)
                                            @if($sector['id'] == old('document'))
                                                <option value="{{$sector['id']}}" selected>{{$sector['sector_name']}}</option>
                                            @else
                                                <option value="{{$sector['id']}}">{{$sector['sector_name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'sector_id'])
                                </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Company Name</label>
                                    <input type="text" name="company_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('company_name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'company_name'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Company Owner</label>
                                    <input type="text" name="owner" id="input-owner" class="form-control form-control-alternative{{ $errors->has('owner') ? ' is-invalid' : '' }}" placeholder="Owner" value="{{ old('owner') }}" required>
                                    @include('alerts.feedback', ['field' => 'owner'])
                                </div>

                                <div class="form-group{{ $errors->has('designation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-designation">Owner Designation</label>
                                    <input type="text" name="designation" id="input-designation" class="form-control form-control-alternative{{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="Designation" value="{{ old('designation') }}" required>
                                    @include('alerts.feedback', ['field' => 'designation'])
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">                                    
                                        <div class="form-group{{ $errors->has('gst') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-gst">GST</label>
                                            <input type="number" step=".01" name="GST" id="input-gst" class="form-control form-control-alternative" placeholder="GST" value="{{ old('gst') }}" min="0" required>
                                            @include('alerts.feedback', ['field' => 'GST'])
                                        </div>
                                    </div>                            
                                    <div class="col-6">                                    
                                        <div class="form-group{{ $errors->has('number_of_units') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-number_of_units">Number of Units</label>
                                            <input type="number" name="number_of_units" id="input-number_of_units" class="form-control form-control-alternative" placeholder="Number of Units" value="{{ old('number_of_units') }}" min="0" required>
                                            @include('alerts.feedback', ['field' => 'number_of_units'])
                                        </div>
                                    </div>                         
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Address" value="{{ old('address') }}" required>
                                            @include('alerts.feedback', ['field' => 'address'])
                                        </div>
                                    </div>    
                                    <div class="col-4">    
                                        <div class="form-group{{ $errors->has('ntn') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-ntn">NTN</label>
                                            <input type="text" name="NTN" id="input-ntn" class="form-control form-control-alternative{{ $errors->has('ntn') ? ' is-invalid' : '' }}" placeholder="NTN" value="{{ old('ntn') }}" required>
                                            @include('alerts.feedback', ['field' => 'NTN'])
                                        </div>
                                    </div>    

                                    <div class="col-4">    
                                        <div class="form-group{{ $errors->has('email_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">Email</label>
                                            <input type="text" name="email_id" id="input-email" class="form-control form-control-alternative{{ $errors->has('email_id') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email_id') }}" required>
                                            @include('alerts.feedback', ['field' => 'email_id'])
                                        </div>
                                    </div>    
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-mobile">Mobile</label>
                                            <input type="text" name="mobile" id="input-mobile" class="form-control form-control-alternative{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="Mobile" value="{{ old('mobile') }}" required>
                                            @include('alerts.feedback', ['field' => 'mobile'])
                                        </div>
                                    </div>    
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('ptcl') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-ptcl">PTCL</label>
                                            <input type="text" name="PTCL" id="input-ptcl" class="form-control form-control-alternative{{ $errors->has('ptcl') ? ' is-invalid' : '' }}" placeholder="Ptcl" value="{{ old('ptcl') }}" required>
                                            @include('alerts.feedback', ['field' => 'ptcl'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('ext') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-ext">Extension</label>
                                            <input type="text" name="ext" id="input-ext" class="form-control form-control-alternative{{ $errors->has('ext') ? ' is-invalid' : '' }}" placeholder="Extension" value="{{ old('ext') }}" required>
                                            @include('alerts.feedback', ['field' => 'ext'])
                                        </div>
                                    </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush