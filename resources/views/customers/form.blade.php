<div class="form-grid">
    <div class="field"><label for="full_name">Full name <span>*</span></label><input id="full_name" name="full_name" value="{{ old('full_name', $customer->full_name ?? '') }}" required maxlength="100">@error('full_name')<small class="error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="email">Email address <span>*</span></label><input id="email" type="email" name="email" value="{{ old('email', $customer->email ?? '') }}" required maxlength="150">@error('email')<small class="error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="phone">Phone number</label><input id="phone" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" maxlength="30">@error('phone')<small class="error">{{ $message }}</small>@enderror</div>
</div>
<div class="form-actions"><button class="button" type="submit">{{ $submitLabel }}</button><a class="button secondary" href="{{ route('customers.index') }}">Cancel</a></div>
