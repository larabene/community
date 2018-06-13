<h4 class="header-title m-t-0 m-b-30">Bedrijf gegevens</h4>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" value="{{ old('name', $profile->name) }}" placeholder="Bedrijfsnaam" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="address" value="{{ old('address', $profile->address) }}" placeholder="Adres" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('zipcode') || $errors->has('city') ? ' has-error' : '' }}">
            <div class="col-md-4">
                <input type="text" class="form-control" name="zipcode" value="{{ old('zipcode', $profile->zipcode) }}" placeholder="Postcode" />
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="city" value="{{ old('city', $profile->city) }}" placeholder="Plaats" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="country" value="{{ old('country', $profile->country) }}" placeholder="Land" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_number') || $errors->has('vat_number') ? ' has-error' : '' }}">
            <div class="col-md-6">
                <input type="text" class="form-control" name="company_number" value="{{ old('company_number', $profile->company_number) }}" placeholder="KvK nummer" />
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="vat_number" value="{{ old('vat_number', $profile->vat_number) }}" placeholder="BTW nummer" />
            </div>
        </div>
    </div>
</div>

<hr />

<h4 class="header-title m-t-0 m-b-30">Contact gegevens</h4>

<div class="row">
    <div class="col-lg-12">

        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="website" value="{{ old('website', $profile->website) }}" placeholder="Website" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('emailaddress') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="emailaddress" value="{{ old('emailaddress', $profile->emailaddress) }}" placeholder="E-mailadres" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="telephone" value="{{ old('telephone', $profile->telephone) }}" placeholder="Telefoonnummer" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="mobile" value="{{ old('mobile', $profile->mobile) }}" placeholder="Mobiel nummer" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('whatsapp') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp) }}" placeholder="Whatsapp nummer" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('coordinates_lat') || $errors->has('coordinates_lng') ? ' has-error' : '' }}">
            <div class="col-md-6">
                <input type="text" class="form-control" name="coordinates_lat" value="{{ old('coordinates_lat', $profile->coordinates_lat) }}" placeholder="Coordinaat Lat" />
                <span class="help-block"><small><a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Lat/lng tool</a></small></span>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="coordinates_lng" value="{{ old('coordinates_lng', $profile->coordinates_lng) }}" placeholder="Coordinaat Lng" />
            </div>
        </div>
    </div>
</div>

<hr />

<h4 class="header-title m-t-0 m-b-30">Social Media</h4>

<div class="row">
    <div class="col-lg-12">

        <div class="form-group{{ $errors->has('facebook') || $errors->has('linkedin') ? ' has-error' : '' }}">
            <div class="col-md-6">
                <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $profile->facebook) }}" placeholder="Facebook URL" />
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="linkedin" value="{{ old('linkedin', $profile->linkedin) }}" placeholder="LinkedIn URL" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('twitter') || $errors->has('googleplus') ? ' has-error' : '' }}">
            <div class="col-md-6">
                <input type="text" class="form-control" name="twitter" value="{{ old('twitter', $profile->twitter) }}" placeholder="Twitter URL" />
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="googleplus" value="{{ old('googleplus', $profile->googleplus) }}" placeholder="GooglePlus URL" />
            </div>
        </div>

    </div>
</div>

<hr />

<h4 class="header-title m-t-0 m-b-30">Overige</h4>

<div class="row">
    <div class="col-lg-6">

        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">Logo</label>
            <div class="col-md-10">
                <input type="file" class="dropify" name="logo" data-default-file="{{ asset($profile->logo) }}"  />
                <span class="help-block"><small>400 x 400</small></span>
            </div>
        </div>

    </div>
    <div class="col-lg-6">

        <div class="form-group{{ $errors->has('founded_at') ? ' has-error' : '' }}">
            <div class="col-md-10">
                <input type="text" class="form-control" name="founded_at" value="{{ old('founded_at', $profile->founded_at ? $profile->founded_at->format('Y') : '' ) }}" placeholder="Oprichtingsjaar" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('hourly_rate') ? ' has-error' : '' }}">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-addon">&euro;</span>
                    <input type="text" class="form-control" name="hourly_rate" value="{{ old('hourly_rate', $profile->hourly_rate) }}" placeholder="Uurtarief" />
                </div>
            </div>
        </div>

        <div class="form-group{{ $errors->has('available') ? ' has-error' : '' }}">
            <div class="col-md-10">
                <div class="checkbox checkbox-primary">
                    <input id="available" type="checkbox" name="available" value="1"{{ old('available', $profile->available) == 1 ? ' checked="checked"' : '' }}>
                    <label for="available">
                        We zijn beschikbaar voor werk
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>

<hr />

<h4 class="header-title m-t-0 m-b-30">Over het bedrijf</h4>

<div class="row">
    <div class="col-lg-12">

        <div class="form-group{{ $errors->has('intro') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <input type="text" class="form-control" name="intro" value="{{ old('intro', $profile->intro) }}" placeholder="Introductie (+- 2 regels)" />
            </div>
        </div>

        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
            <div class="col-md-12">
                <textarea class="form-control" rows="10" name="about" placeholder="Vrij tekstveld over het bedrijf">{{ old('about', $profile->about) }}</textarea>
                <span class="help-block"><small>Markdown toegestaan</small></span>
            </div>
        </div>

    </div>
</div>
