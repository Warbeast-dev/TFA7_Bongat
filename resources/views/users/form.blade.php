<div class="form-grid">
    <div class="field"><label for="username">Username <span>*</span></label><input id="username" name="username" value="{{ old('username', $user->username ?? '') }}" required maxlength="50">@error('username')<small class="error">{{ $message }}</small>@enderror</div>
    <div class="field"><label for="full_name">Full name <span>*</span></label><input id="full_name" name="full_name" value="{{ old('full_name', $user->full_name ?? '') }}" required maxlength="100">@error('full_name')<small class="error">{{ $message }}</small>@enderror</div>
    @if ($showAvatar)
    <div class="field full"><label for="avatar">Profile picture</label><input id="avatar" type="file" name="avatar" accept="image/jpeg,image/png,image/gif,image/webp"> <small>Optional. JPG, JPEG, PNG, GIF, or WEBP; maximum 2 MB.</small>@error('avatar')<small class="error">{{ $message }}</small>@enderror</div>
    @endif
</div>
<div class="form-actions"><button class="button" type="submit">{{ $submitLabel }}</button><a class="button secondary" href="{{ route('users.index') }}">Cancel</a></div>
