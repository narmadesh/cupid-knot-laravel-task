<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    @include('head')
</head>
<body>
    @include('navbar')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="shadow bg-white p-4">
                <form method="post" action="/register-user">
                    <h4>Register</h4>
                    <h6>Basic information</h6>
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>first name *</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>last name *</label>
                                <input type="text" class="form-control" name="last_name" required >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>email *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>password *</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>date of birth *</label>
                                <input type="date" class="form-control" name="dob" required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>gender *</label>
                            <div class="form-group">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="Male">Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="Female">Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>annual income *</label>
                                <input type="text" class="form-control" name="annual_income" required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>occupation</label>
                                <select name="occupation" class="form-control">
                                    <option></option>
                                    <option value="Private job">Private job</option>
                                    <option value="Government job">Government job</option>
                                    <option value="Business">Business</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>family type</label>
                                <select name="family_type" class="form-control">
                                    <option></option>
                                    <option value="Joint family">Joint family</option>
                                    <option value="Nuclear family">Nuclear family</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>manglik</label>
                                <select name="manglik" class="form-control">
                                    <option></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h6>Partner preference</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>expected income</label>
                                <!-- <input type="text" class="form-control" name="partner_annual_income" required /> -->
                                <input type="text" id="amount" name="partner_annual_income" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            </div>
                            <div id="slider-range"></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>occupation</label>
                                <select name="partner_occupation[]" class="form-control" multiple>
                                    <option></option>
                                    <option value="Private job">Private job</option>
                                    <option value="Government job">Government job</option>
                                    <option value="Business">Business</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>family type</label>
                                <select name="partner_family_type[]" class="form-control" multiple>
                                    <option></option>
                                    <option value="Joint family">Joint family</option>
                                    <option value="Nuclear family">Nuclear family</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>manglik</label>
                                <select name="partner_manglik" class="form-control">
                                    <option></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="submit" class="btn btn-primary" value="Register">
                    </div>
                    <div class="text-center my-3">Or</div>
                    <div class="text-center">
                        <a href="{{ route('google.login') }}" class="btn btn-danger">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</body>
<script>
    $(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 100000,
            values: [10000, 50000],
            slide: function (event, ui) {
                $("#amount").val("Rs." + ui.values[0] + " - Rs." + ui.values[1]);
            }
        });
        $("#amount").val("Rs." + $("#slider-range").slider("values", 0) +
            " - Rs." + $("#slider-range").slider("values", 1));
    });
</script>
</html>