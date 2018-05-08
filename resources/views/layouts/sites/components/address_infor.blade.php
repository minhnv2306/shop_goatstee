<p class="form-row form-row form-row-first validate-required"
   id="first_name_field">
    <label for="first_name" class=""> @lang('sites.user.first_name')<abbr class="required"
                                                                          title="required">*</abbr></label>
    {!! Form::text('first_name', !empty($user) ? $user->first_name : '', [
        'class' => 'input-text',
        'id' => 'first_name',
        'autocomplete' => 'given-name',
        'required' => '',
    ]) !!}
</p>
<p class="form-row form-row form-row-last validate-required" id="last_name_field">
    <label for="last_name" class="">@lang('sites.user.last_name') <abbr class="required"
                                                                        title="required">*</abbr></label>
    {!! Form::text('last_name', !empty($user) ? $user->last_name : '', [
        'class' => 'input-text',
        'id' => 'last_name',
        'autocomplete' => 'family-name',
        'required' => '',
    ]) !!}
</p>
<div class="clear"></div>
<p class="form-row form-row form-row-wide" id="company_field">
    <label for="company" class=""> @lang('sites.user.company') </label>
    {!! Form::text('company', !empty($user) ? $user->company : '', [
        'class' => 'input-text',
        'id' => 'company',
        'autocomplete' => 'organization'
    ]) !!}
</p>
<p class="form-row form-row form-row-first validate-required validate-email"
   id="email_field">
    <label for="email" class=""> @lang('sites.user.email') <abbr class="required" title="required">*</abbr></label>
    {!! Form::text('email', !empty($user) ? $user->email : '', [
       'class' => 'input-text',
       'id' => 'email',
       'autocomplete' => 'email'
    ]) !!}
</p>
<p class="form-row form-row form-row-last validate-required validate-phone"
    id="phone_field"><label for="phone" class=""> @lang('sites.user.phone')
        <abbr class="required" title="required">*</abbr></label>
    {!! Form::text('phone', !empty($user) ? $user->phone : '', [
       'class' => 'input-text',
       'id' => 'phone',
       'autocomplete' => 'tel'
    ]) !!}
</p>
<div class="clear"></div>
<p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required"
    id="country_field"><label for="country" class=""> @lang('sites.user.country')
        <abbr class="required" title="required">*</abbr></label>
    <select name="country_id" id="country" autocomplete="country"
            class="country_to_state country_select ">
        <option value="0">Select a country&hellip;</option>
        <option value="1">Vietnam</option>
    </select>
</p>
<p class="form-row form-row form-row-wide address-field validate-required"
    id="address_field">
    <label for="address" class=""> @lang('sites.user.address') <abbr class="required" title="required">*</abbr></label>
    {!! Form::text('address', !empty($user) ? $user->address : '', [
       'class' => 'input-text',
       'id' => 'address',
       'autocomplete' => 'address-line1',
       'placeholder' => 'Street address'
    ]) !!}
</p>
<p class="form-row form-row form-row-wide address-field validate-required"
   id="city_field">
    <label for="city" class=""> @lang('sites.user.city') <abbr class="required" title="required">*</abbr></label>
    <select name="city_id" id="country" autocomplete="country" class="country_to_state country_select ">
        <option value="0">Select a country&hellip;</option>
        <option value="1">Hanoi</option>
    </select>
</p>
