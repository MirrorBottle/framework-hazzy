@csrf
<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
    <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->company_id }}">
    <div>
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" id="name" class="form-input" value="{{ isset($data) ? $data->name : '' }}" required>
    </div>
    <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-input" value="{{ isset($data) ? $data->email : '' }}" required>
    </div>
    <div>
        <label for="phone_number" class="form-label">No. HP</label>
        <input type="text" name="phone_number" id="phone_number" class="form-input" value="{{ isset($data) ? $data->phone_number : '' }}" required>
    </div>
    <div>
        <label for="phone_number" class="form-label">Jabatan</label>
        <select id="countries" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
            <option {{ isset($data) ? ($data->role == '4' ? 'selected' : '') : '' }} value="4">Pegawai</option>
            <option {{ isset($data) ? ($data->role == '3' ? 'selected' : '') : '' }} value="3">PJO</option>
        </select>
    </div>
    <div>
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-input">
    </div>
</div>
<div class="flex justify-between mt-5">
    <a class="btn-secondary" href="{{ route('users.index') }}">
        <i class="fa-solid fa-chevron-left mr-2"></i>
        Kembali
    </a>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
        <i class="fa-solid fa-floppy-disk mr-2"></i>
        Simpan Data
    </button>
</div>
